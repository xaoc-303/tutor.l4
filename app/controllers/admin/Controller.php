<?php

class Admin_Controller extends BaseController {

	public function getAuth() {

		return View::make('admin.auth')
            ->with('title',__CLASS__)
            ->nest('content', 'main.welcome');
	}

	public function postAuth() {

    	$username = Input::get('username');
    	$password = Input::get('password');

    	if($username == $password){
            Session::put('user_auth', true);
            Session::put('user_name', $username);
    		return Redirect::to('/');
    	}
        return Redirect::back()->with('shield','Red');
    }

    public function postLogout() {

        Session::flush();
        Session::regenerate();
        return Redirect::back();
    }

}