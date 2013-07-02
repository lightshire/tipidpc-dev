<?php
	class UserPanelController extends BaseController{
		public function getProfile(){
			return View::make('home.template')->with(array(
													'current'	=>	'user-profile',
													'head'		=>	View::make('home.blocks.head')->with(array('current'=>'/usercp')),
													'body'		=>	'',
													'foot'		=>	'',
													'class'		=>	'user-profile',
													'title'		=>	'TipidPC | User CP'));
		}
		public function getLogout(){
			Session::forget('user');
			return Redirect::to('forum');
		}	
	}