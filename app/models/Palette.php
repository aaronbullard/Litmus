<?php

use Litmus\Exceptions\ValidationException;

class Palette extends AbstractModel{
	protected $guarded = array();

	protected $fillable = ['title', 'description']; 

	public static $rules = array(
		'title' 		=> 'required',
		'description' 	=> 'required',
		'user_id' 		=> 'required|exists:users,id'
	);

	public function colors()
	{
		return $this->hasMany('Color');
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
