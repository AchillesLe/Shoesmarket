<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\news;

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
            for($x=0;$x<6;$x++)
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
}
