<?php

namespace App\Http\Controllers\User;

use Request;
use App\Http\Controllers\Controller;
use App\News as news;
use App\Product;
use App\Productcolor;
use App\Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class pageController extends Controller
{
    public function getIndex()
    {
        $listnews = news::paginate(18);
        $counter =  count($listnews);
        // $n = CEIL($counter/4);
        // $listnew =  array();
        // $j=0;
        // for($i = 0 ;$i < $counter ; $i++)
        // {
        //     for($x=0;$x<6;$x++) 
        //     {
        //         if($i<$counter)
        //         {
        //             $listnew[$j][$x] = $listnews[$i];
        //         }
        //         $i++;
        //     }
        //     $i--;
        //     $j++;  
        // }
    	return view('user.page.home',['listnew'=>$listnews,'total'=>$counter]);
    }
    public function getContacts()
    {
        return view('user.page.contacts');
    }
     public function getAbouts()
    {
        return view('user.page.abouts');
    }
    public function Search($keyword='')
    {
        $news = news::where('',$id)->first();
        $productcolor = Productcolor::where('idproduct',$id)->get();
        return view('user.page.abouts');
    }
    public function getdetailProduct($id)
    {

            $news = news::where('idproduct',$id)->first();
            $productcolor = Productcolor::where('idproduct',$id)->get();
            $idtype = $news->product->idtype;
            $listnews = news::latest()->take(8)->get();   
            $related = news::whereIn('idproduct',function($q) use ($idtype){
            $q->from('products')->where('idtype',$idtype)->select('id')->get();
                    });
            $count = $related->count() >3 ? 4 : $related->count();  
                    $listrelated = $related->orderBy(DB::raw('RAND()'))->take($count)->get();
                       
            return view('user.page.detailproduct',['news'=>$news,'productcolor'=>$productcolor,'related'=>$listrelated,'listnews'=>$listnews,'id'=>""]);
    }
    public function getProductType($name)
    {
        if($name=='Nam') $sex =1;
        if($name=='Nu') $sex =2;
        $listtype = Type::all();
        $listnews = news::whereIn('idproduct',function($q) use ($sex){
            $q->from('products')->where('sex',$sex)->orWhere('sex','3')->select('id')->get();
        })->paginate(12);

        return view('user.page.product_type',['listnews'=>$listnews,'sex'=>$name,'listtype'=>$listtype]);
    }
    public function getProductbysexandtype($sex,$name)
    {
        if($sex=='Nam') $Newsex = 1;
        if($sex=='Nu') $Newsex = 2;
        $listtype = Type::all();
        $listnews = news::whereIn('idproduct',function($q) use ($Newsex,$name){
            $q->from('products')->whereIn('sex',[$Newsex,'3'])->where('idtype',function($z) use ($name){
                            $z->from('types')->where('namemeta',$name)->select('id')->get();
                        })->select('id')->get();
                    })->paginate(12);

        return view('user.page.product_type',['listnews'=>$listnews,'sex'=>$sex,'listtype'=>$listtype]);
    }
    public function checkquantity(Request $request)
    {
        if(Request::ajax())
        {
            $idpro=Request::get('idpro');
            $color=Request::get('color');
            $size=Request::get('size');
            $qty=Request::get('qty');
            if($idpro > 0 && $color != null && $size > 0 && $qty > 0 )
            {
                $productcolor = Productcolor::where('idproduct',$idpro)
                                            ->where('color',$color)
                                            ->where('size',$size)->first();
                if($productcolor->quantity > $qty) return 'true';
                return 'false';
            }
        }
        return 'NaN';
    }
}
