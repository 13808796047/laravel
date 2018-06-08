<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class StaticPageController extends Controller
{
    public function home()
    {
        if (Auth::check()){
            $feed_items = Auth::user()->feed()->paginate(10);
            return view('static_page.home',compact('feed_items'));
        }else{
            return view('static_page.home');
        }

    }
    public function help()
    {
        return view('static_page.help');
    }
    public function about()
    {
        return view('static_page.about');
    }
}
