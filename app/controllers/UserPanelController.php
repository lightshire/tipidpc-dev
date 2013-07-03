<?php
	class UserPanelController extends BaseController{
		public function getProfile(){
			

			return View::make('home.template')->with(array(
													'current'	=>	'user-profile',
													'head'		=>	View::make('home.blocks.head')->with(array('current'=>'/usercp')),
													'body'		=>	View::make('usercp.profile'),
													'foot'		=>	'',
													'class'		=>	'user-profile',
													'title'		=>	'TipidPC | User CP'));
		}
		public function postProfile(){
			if(e(Input::get('type')) == "change-password"){
				/* check validations
				-----------------------------*/
				$rules = array(
					'currentPassword' 	=>	'required',
					'password'		 	=> 	'required',
					'password2'			=>	'required|same:password'
				);
				$validation = Validator::make(Input::all(), $rules);
				if($validation->fails()){
					return Redirect::to('usercp/profile')->with('password-error','Please complete all fields to save new password');
				}

				/**touch and check if current password is valid
				---------------------------------------------------*/
				if(!Hash::check(e(Input::get('currentPassword')), Auth::user()->password)){
					return Redirect::to('usercp/profile')->with('password-error','The password you submitted is incorrect');
				}

				
				/* save password to database
				--------------------------------------------------*/
				$user = Auth::user();
				$user->password = Hash::make('password');
				$user->save();
				return Redirect::to('usercp/profile')->with('password-success','Password change was a success!');
			}else if(e(Input::get('type')) == "change-details"){


				/* check validations
				-----------------------------*/
				$rules = array(
					'email' 		=>	'required',
					'first_name'	=>	'required',
					'middle_name'	=>	'required',
					'last_name'		=>	'required'
				);
				$validation = Validator::make(Input::all(), $rules);
				if($validation->fails()){
					return Redirect::to('usercp/profile')->with('details-error','Please complete all fields to save new password');
				}

				/* save info */
				$user = Auth::user();
				$user->saveUserInfo();
				return Redirect::to('usercp/profile')->with('details-success','Info successfuly saved');
			}
		}
		public function getLogout(){
			Auth::logout();
			return Redirect::to('forum');
		}	
	}