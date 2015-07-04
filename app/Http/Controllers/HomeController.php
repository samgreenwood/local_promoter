<?php namespace LocalPromoter\Http\Controllers;

use LocalPromoter\UserReward;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userRewards = UserReward::all();

        return view('home', compact('userRewards'));
    }
}