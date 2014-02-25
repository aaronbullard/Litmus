<?php

class Image extends Eloquent {

	protected $guarded = array('red', 'green', 'blue');
	protected $fillable = ['url', 'parameters'];

	protected $hidden = ['account_id'];
	
	public static $rules = array(
		'url' => 'required|url',
		'parameters' => '',
		'red' => 'between:0,255',
		'green' => 'between:0,255',
		'blue' => 'between:0,255',
		'alpha' => 'between:0,255',
		'account_id' => 'required|exists:accounts,id'
	);

	public function account()
	{
		return $this->belongsTo('Account');
	}

	public function getBoundingBox()
	{
		if( is_null($this->parameters) )
		{
			return [NULL, NULL, NULL, NULL];
		}

		$p = json_decode($this->parameters);

		return [$p->x1, $p->y1, $p->x2, $p->y2];
	}

	public function toArray()
	{
		$array = parent::toArray();
		$clean = array();
		foreach($array as $attr => $value)
		{
			if( $attr === 'url' )
			{
				$clean[$attr] = $value;
				continue;
			}
			$clean[$attr] = is_numeric($value) ? (int) $value : $value;
		}
		return $clean;
	}
}
