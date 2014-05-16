<?php

use Aaronbullard\Litmus\Exceptions\ValidationException;

class Palette extends AbstractModel{
	protected $guarded = array();

	protected $fillable = ['title', 'description']; 

	public static $rules = array(
		'title' 		=> 'required',
		'description' 	=> 'required',
		'account_id'	=> 'required|exists:accounts,id',
		'user_id' 		=> 'required|exists:users,id'
	);

	public function colors(){
		return $this->hasMany('Color');
	}

	public function account(){
		return $this->belongsTo('Account');
	}

	/**
	 * Person who created the palette
	 * @return User
	 */
	public function user()
	{
		return $this->belongsTo('User');
	}

}
