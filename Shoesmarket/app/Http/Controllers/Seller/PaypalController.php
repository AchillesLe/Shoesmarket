<?php
namespace App\Http\Controllers\seller;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;
use DB;
use Cart;
use App\Package;
use App\Receipt;
use App\Seller;
use Auth;
use Carbon\Carbon;

//-------------------------
//All Paypal Details class
//-------------------------
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        //------------------------   
        //setup PayPal api context
        //------------------------
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function getCart($id)
    {
        $package=DB::table('packages')->where('id',$id)->first();
        return view('seller.page.cart',compact('package'));
    }
    public function postPaymentWithpaypal(Request $request)
    {
        Session::put('invoice', $request->all());
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName($request->get('ten_goi_tin').' --- '.$request->get('cost').' / '.$request->get('sotin')) 
            ->setCurrency('USD')
            ->setQuantity($request->get('so_luong_goi'))
            ->setPrice($request->get('cost')); 

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $tigia = "22680";
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('tong_tien'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Chi tiết giao dịch');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) 
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Hết thời gian giao dịch');
                return Redirect::route('getCart',['id'=>$request->get('id')]);
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Có lỗi xảy ra. Xin lỗi về sự bất tiện này');
                return Redirect::route('getCart',['id'=>$request->get('id')]);
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }

        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }

        \Session::put('error','Phát hiện lỗi trong quá trình giao dịch');
        return Redirect::route('getCart',['id'=>$request->get('id')]);
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $list_invoice_detail = Session::get('invoice');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
          
            return Redirect::route('getCart',['id' => $list_invoice_detail['id']])->with('error', 'Giao dịch không thành công');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') { 
         $pt = new Receipt;
         $pt->namepackage = $list_invoice_detail['ten_goi_tin'];
         $pt->idemployee = 1;
         $pt->idseller = Auth::user()->id;
         $pt->newquantity = $list_invoice_detail['sotin'];
         $pt->money = $list_invoice_detail['cost'];
         $pt->packagequantity = $list_invoice_detail['so_luong_goi'];
         $pt->totalmoney = $list_invoice_detail['tong_tien'];
         $pt->created_at = Carbon::now()->toDateTimeString();
         $pt->updated_at = Carbon::now()->toDateTimeString();
         $pt->save();
             $seller = Seller::find(Auth::user()->id);
                   $seller->newsquantity += $list_invoice_detail['so_luong_tin'];
                   $seller->save();
            Session::forget('invoice');

            return Redirect::route('getCart',['id' => $list_invoice_detail['id']])->with('success', 'Giao dịch thành công');
        }

        return Redirect::route('getCart',['id' => $list_invoice_detail['id']])->with('error', 'Giao dịch không thành công');
    }
}