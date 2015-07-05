<?php namespace LocalPromoter\Http\Controllers;

class PagesController extends Controller
{
    public function terms()
    {
        return view('terms');
    }

    public function howitworks()
    {
        return view('howitworks');
    }

    public function contact()
    {
        return view('contact');
    }
}