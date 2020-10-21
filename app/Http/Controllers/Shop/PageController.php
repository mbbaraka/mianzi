<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
    	return view('home.pages.about-us');
    }

    public function contact()
    {
    	return view('home.pages.contact-us');
    }

    public function faq()
    {
    	return view('home.pages.faq');
    }

    public function termsAndCondition()
    {
    	return view('home.pages.terms-and-conditions');
    }
}
