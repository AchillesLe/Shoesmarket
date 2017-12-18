<?php
namespace App\Http\Controllers\seller;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Input;
use DB;
use Cart;
use App\Models\Package;

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

class PaymentController extends Controller
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

    public function getCart($id){
        $package=DB::table('package')->where('id',$id)->first();
        return view('seller.page.cart',compact('package'));
    }
    /**public function addPayment()
    {
        return view('addPayment');
    }**/

    public function postPaymentWithpaypal(Request $request)
    {
        Session::put('invoice', $request->all());
        
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1  
        ->setName($request->get('name')) /** item name **/
            ->setCurrency('USD')
            ->setQuantity($request->get('newquantity'))
            ->setPrice($request->get('money')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('money'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Chi tiết giao dịch');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Hết thời gian giao dịch');
                return Redirect::route('getCart');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Có lỗi xảy ra. Xin lỗi về sự bất tiện này');
                return Redirect::route('getCart');
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
        return Redirect::route('getCart');
    }

    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
          
            return Redirect::route('getCart')->with('error', 'Giao dịch không thành công');
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
         $list_invoice_detail = Session::get('invoice');
      
//              DB::table('phieu_thu')->insert(
//                   [
//                       'id_goitin' => $list_invoice_detail['id_goitin'],
//                       'id_m'=>Auth::guard('merchant')->user()->id_m,
//                       'so_luong' =>  $list_invoice_detail['so_luong'],
//                       'tong_tien' =>  $list_invoice_detail['tong_tien'],
//                       'created_at'=>date("Y/m/d")
//                   ]
//               );
                      
        $pt = new Receipt;
         $pt->namepackage = $list_invoice_detail['name'];
         $pt->idseller = 2;
         $pt->newquantity = $list_invoice_detail['newquantity'];
         $pt->money = $list_invoice_detail['money'];
         $pt->save();
             $merchant = \App\Models\Seller::find('id',2);
                   $merchant->newsquantity += $list_invoice_detail['newquantity'];
                   $merchant->save();
            Session::forget('invoice');
            return Redirect::route('getCart')->with('success', 'Giao dịch thành công');
        }

        return Redirect::route('getCart')->with('error', 'Giao dịch không thành công');
    }
}