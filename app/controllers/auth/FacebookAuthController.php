<?php
	class FacebookAuthController extends BaseController{
		public function getRegister(){
			$auth = Facebook::auth();
			if(!Input::get('code') && !Session::get('fb_token')){
				return Redirect::to($auth->getLoginUrl(array('email','user_website')));
			}
			if(Input::get('code')){
				$access = $auth->getAccess(Input::get('code'));
				Session::put('fb_token',$access['access_token']);
				return Redirect::to('register')->with(array('fb_user'	=>	Facebook::graph()->getUser()));
			}else{
				return Redirect::to('register')->with(array('fb_user'	=>	Facebook::graph()->getUser()));
			}
		}
	}
