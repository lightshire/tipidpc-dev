<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class UserAccount extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_accounts';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	*	Saves new instance of ordinary user to database
	*	@return User
	*/
	public static function saveOrdinaryUser(){
		$user = new self;
		$user->username = e(Input::get('username'));
		$user->password = Hash::make(e(Input::get('password')));
		$user->role_id = 1;
		$user->status_id = 1;
		$user->save();
		return $user;
	}

	/**
	*	Saves new instance or update instance of user_infos to database
	*	@return UserInfo
	*/

	public function saveUserInfo(){
		return UserInfo::saveInfo($this->id);
	}

	/**
	*	UserInfo Relationship Has-One
	*	@return UserInfo
	*/
	public function info(){
		return $this->hasOne('UserInfo','user_account_id');
	}

}