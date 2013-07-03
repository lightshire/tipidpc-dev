<?php
	class UserInfo extends Eloquent{
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'user_infos';

		/**
		* Saves new instance of UserInfo
		* @param user_id | int
		* @return UserInfo
		*/
		public static function saveInfo($user_id){
			$user = self::where('user_account_id','=',$user_id)->first();
			
			//if data is not in database, create new instance
			if(!$user){
				$user = new UserInfo;
			}

			$user->first_name		= e(Input::get('first_name'));
			$user->middle_name		= e(Input::get('middle_name'));
			$user->last_name		= e(Input::get('last_name'));
			$user->email 			= e(Input::get('email'));
			$user->phone			= e(Input::get('phone'));
			$user->location 		= e(Input::get('location'));
			$user->user_account_id 	= e($user_id);
			$user->save();
			return $user;
		}
	}