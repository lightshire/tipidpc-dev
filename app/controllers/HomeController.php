<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}


	/* registration method actions (s) */
	public function getRegister(){
		return View::make('home.template')->with(array(
													'current'	=>	'register',
													'head'		=>	View::make('home.blocks.head')->with(array('current'=>'/register')),
													'body'		=>	View::make('home.blocks.register'),
													'foot'		=>	'',
													'class'		=>	'register-body',
													'title'		=>	'TipidPC | Register'));
	}

	public function postRegister(){
		/*	Validation first 
		------------------------------------*/
		$rules = array(
				'username'	=>	'required',
				'password'	=>	'required',
				'password2'	=>	'required',
				'email'		=>	'required'
			);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('/register')->with('error','All fields are required.');
		}

		/*	Protect CSRF
		------------------------------------*/
		if(Session::token() != e(Input::get('_token'))){
			return Redirect::to('/register')->with('error','Please check if you are able to update your sessions. Please clear all cache.');
		}



		/* Save user to database 
		-------------------------------------------*/
		$user = UserAccount::whereUsername(e(Input::get('username')))->first();
		if($user){
			return Redirect::to('/register')->with('error','The username and / or the password has already been used. ');
		}else{
			$user = UserAccount::saveOrdinaryUser();
			$user->saveUserInfo();
			return Redirect::to('/register')->with('success', 'Thank you for Registering! You may now login using the credentials you gave in.');
		}

	}
	/* registration method actions (e) */
	public function postLogin(){
		/*Validation first
		-------------------------------------*/
		$rules = array(
				'username'	=>	'required',
				'password'	=>	'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('/register')->with('login-error','Please complete all fields.');
		}

		/*	Protect CRSF
		-------------------------------------*/
		if(Session::token() != e(Input::get('_token'))){
			return Redirect::to('/register')->with('login-error','Please check if you are able to update your sessions. Please clear all cache.');
		}

		if(!Auth::attempt(array('username'=>e(Input::get('username')),'password'=>e(Input::get('password'))))){
			return Redirect::to('/register')->with('login-error','The username and password does not match!');
		}else{
			return Redirect::to('/forum');
		}

	}

	

}