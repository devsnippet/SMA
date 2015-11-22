<?php

class AccountController extends BaseController {

    protected $layout = 'layouts.master';
	
	public function get_login()
	{
		$this->layout->content = View::make('account.login');
	}
	public function post_login()
	{
		$username = Input::get("username");
		$password = Input::get("password");
		if($username == "admin" && $password == "password"){
			Session::set('user_id', $username);
			return Redirect::to('/');
		}
		else{
			$this->layout->content = View::make('account.login');	
		}
	}
	
	public function get_logout()
	{
		Session::set('user_id', NULL);
		return Redirect::to('/');
	}
}
