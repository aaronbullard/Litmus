<?php

class Account extends Eloquent{

	protected $guarded = array();

	public static $rules = array(
		'account' 	=> 'required|unique:accounts,account',
		'token' 	=> 'required',
		'user_id'	=> 'required|exists:users,id'
	);

	public function palettes()
	{
		return $this->hasMany('Palette');
	}

	public function admin()
	{
		return $this->belongsTo('User', 'user_id');
	}

	public function users()
	{
		return $this->belongsToMany('User');
	}

	public function images()
	{
		return $this->hasMany('Image');
	}

	public function isMember(User $user)
	{
		return $this->users()->where('users.id', '=', $user->id)->take(1)->count();
	}

	public static function validateCredentials($account, $token)
	{
		$count = self::whereAccount($account)->whereToken($token)->count();

		return $count > 0 ? TRUE : FALSE;
	}
}
