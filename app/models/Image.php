<?php

class Image extends AbstractModel {

	public $timestamps 		= TRUE;
	protected $guarded 		= ['red', 'green', 'blue', 'alpha'];

	protected static $states = ['queued','processing','completed','failed'];
	
	public static $rules = [
		'path'			=> 'required',
		'filename'		=> 'required|mimes:jpeg',
		'mime'			=> 'required|mimes:jpeg',
		'parameters' 	=> '',
		'callback'		=> 'url',
		'status'		=> 'in:queued,processing,completed,failed',
		'red' 			=> 'between:0,255',
		'green' 		=> 'between:0,255',
		'blue' 			=> 'between:0,255',
		'alpha' 		=> 'between:0,255',
		'user_id' 		=> 'required|exists:users,id'
	];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function setStatus($status)
	{
		if( ! in_array($status, self::$states))
		{
			throw new InvalidArguementException("`$status` is not a valid state for class Image");
		}

		$this->status = $status;

		return $this;
	}

	public function getFullPath()
	{
		return $this->path.'/'.$this->filename;
	}

	public function getRgbaString()
	{
		return $this->status !== 'completed' ? NULL : "rgba({$this->red}, {$this->green}, {$this->blue}, {$this->alpha})";
	}

	public function hasCallback()
	{
		return ! is_null($this->callback);
	}

	public function isCompleted()
	{
		return $this->status === 'completed';
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

	public function deleteFile()
	{
		$path = $this->getFullPath();
		if( File::exists($path) )
		{
			return File::delete($path);
		}
	}

}
