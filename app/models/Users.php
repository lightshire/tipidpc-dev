<?php
	class Users extends MCollection{

			/*	GETS THE CURRENT LOGGED IN USER
			 *	returns User Array from mongodb collection	
			--------------------------*/
		public static function current(){
			$user  		=  Session::get('user');
			$userConn	=  Users::instance();
			return $userConn->where('username',$user)->first();
		}
	}