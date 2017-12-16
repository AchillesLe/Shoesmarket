<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
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
    public function getdetailProduct($id)
    {
            $product = Product::find($id);
            $productcolor = Productcolor::where('idproduct',$id)->get();
        return view('user.page.detailproduct',['product'=>$product,'productcolor'=>$productcolor]);
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
}
