<?php
	include(base_path().'/app/eden/eden.php'); 

	class Facebook{

		public static function auth(){
			return eden('facebook')->auth(
									'139807056223810',  // APP ID
									'190dd3aff50316e46062a63c61a18786', // APP SECREET
									'http://localhost/tipidpc-dev/public/auth/facebook/register' //redirect URL
									);
		}

		public static function getUserImage(){
			return Facebook::graph()->getPictureUrl();
		}
		public static function graph(){
			return eden('facebook')->graph(Session::get('fb_token'));
		}
		public static function isLoggedIn(){
			return Session::get('fb_token');
		}
		public static function getLogoutUrl(){
			return Facebook::graph()->getLogoutUrl(URL::to('/'));
		}

	}