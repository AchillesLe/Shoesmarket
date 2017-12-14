<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News as news;
use App\Product;
use App\Productcolor;

class pageController extends Controller
{
    public function getIndex()
    {
        $listnews = news::all();
        $counter =  count($listnews);
        $n = CEIL($counter/4);
        $listnew =  array();
        $j=0;
        for($i = 0 ;$i < $counter ; $i++)
        {
            for($x=0;$x<6;$x++) // cho t chut xem lai cua t da
            {
                if($i<$counter)
                {
                    $listnew[$j][$x] = $listnews[$i];
                }
                $i++;
            }
            $i--;
            $j++;  
        }
    	return view('user.page.home',['listnew'=>$listnew,'total'=>$counter]);
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
}
