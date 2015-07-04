<?php namespace LocalPromoter\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function getProfile()
    {
        $user = auth()->user();

        return view('profile', compact('user'));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postProfile(Request $request)
    {
        $profileData = $request->only('name', 'phone', 'email', 'about_me');

        auth()->user()->update($profileData);

        return redirect()->back()->withMessage('Profile Updated');
    }
}