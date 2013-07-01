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

	public function getRegister(){
		return View::make('home.template')->with(array(
													'current'	=>	'register',
													'head'		=>	View::make('home.blocks.head')->with(array('current'=>'/register')),
													'body'		=>	View::make('home.blocks.register'),
													'foot'		=>	'',
													'class'		=>	'register-body',
													'title'		=>	'TipidPC | Register'));
	}


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

		/*	Create Mongo User Collenctions Instance
		---------------------------------------------*/
		$userConn 	= 	Users::instance();
		$user 		= 	$userConn->where('username',e(Input::get('username')))->first();

		if(Hash::check(e(Input::get('password')), $user['password'])){
			return Redirect::to('/dashboard');
		}else{
			return Redirect::to('/register')->with('login-error', 'Username / Password combination has not been found.');
		}

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


		/*	Create Mongo Users Collection Instance 
		-------------------------------------------*/
		$userConn = Users::instance();

		/*	Check if the username and / or the email is already saved inside the database */
		if( $userConn->where( 'username', e(Input::get('username')) )
					 ->orWhere('email', e(Input::get('email')))->count() > 0 ){
			return Redirect::to('/register')->with('error','The username and / or the password has already been used. ');
		}else{
			$id = $userConn->insert(array(
					'username' 	=>	e(Input::get('username')),
					'password'	=>  Hash::make( e(Input::get('password')) ),
					'email' 	=>	e(Input::get('email'))
				));
			if($id != null){
				return Redirect::to('/register')->with('success', 'Thank you for Registering! You may now login using the credentials you gave in.');
			}else{
				return Redirect::to('/register')->with('error','An application error has occured. Please contact the IT Technician if this pursues.');
			}
		}

	}

}