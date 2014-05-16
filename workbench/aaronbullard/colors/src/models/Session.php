<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Session extends AbstractModel implements UserInterface, RemindableInterface {

	protected $guarded = ['id', 'password'];

	public static $rules = [
		'id'			=> 'required|unique:users,id',
		'email' 		=> 'required|email|unique:users,email',
		'password'		=> 'required',
		'first_name'	=> 'required',
		'last_name'		=> 'required'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

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
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	public function accounts()
	{
		return $this->belongsToMany('Account');
	}

	public function validate_credentials($account, $token)
	{
		return TRUE;
	}

	public function getFullName()
	{
		return $this->firstname.' '.$this->lastname;
	}

}