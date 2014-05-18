<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Aaronbullard\Litmus\Exceptions\ValidationException;
use Aaronbullard\Litmus\Transformers\ImageTransformer;
use Aaronbullard\Litmus\Transformers\PaginatorTransformer;

class ImageController extends \BaseController {

	protected $transformer;
	protected $paginatorTransformer;

	public function __construct(ImageTransformer $transformer, PaginatorTransformer $paginatorTransformer)
	{
		$this->transformer 			= $transformer;
		$this->paginatorTransformer = $paginatorTransformer;
	}

	public function index()
	{
		try{
			$images = Image::paginate($this->limit);

			return $this->respondOK([
				'data' => $this->transformer->transformArray($images->getItems()),
				'meta' => $this->paginatorTransformer->transform($images)
			]);	
		}
		catch(Exception $e)
		{
			return $this->respondBadRequest();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
			// Check if image file was posted
			if( ! Input::hasFile('image'))
			{
				throw new ValidationException("No image file posted!");
			}

			// Check mime type
			$mime = Input::file('image')->getMimeType();
			$v = Validator::make(['image' => Input::file('image')], ['image' => 'image|mimes:jpeg']);
			if( $v->fails() )
			{
				throw new ValidationException($v->messages()->get('image'));
			}

			// Save image and location to DB, get id, post job
			$user_id 			= Auth::id();
			$image 				= new Image;
			$image->path 		= storage_path().'/images/'.$user_id;
			$image->filename 	= Input::file('image')->getClientOriginalName();
			$image->mime 		= $mime;
			$image->callback 	= Input::has('callback') ? Input::get('callback') : NULL;
			$image->user_id		= Auth::id();

			$image->validate()->save();

			// Move image for storage
			Input::file('image')->move($image->path, $image->filename);

			// Send image for processing to queue
			Queue::push('Aaronbullard\Litmus\Workers\ImageColorAnalysisWorker', ['image_id' => $image->id]);

			// Respond with image id for reference
			return $this->respondCreated([
				'data'	=> $this->transformer->transform($image)
			]);
		}
		catch(ValidationException $e)
		{
			return $this->respondFormValidation($e->getMessage());
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try{
			$image = Image::findOrFail($id);

			return $this->respondOK([
				'data' => $this->transformer->transform($image)
			]);
		}
		catch(ModelNotFoundException $e)
		{
			return $this->respondNotFound();
		}
		catch(Exception $e)
		{
			return $this->respondBadRequest();
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try{
			$image = Image::findOrFail($id);
			$image->delete();

			return Redirect::route('images.index');
		}
		catch(ModelNotFoundException $e)
		{
			return $this->respondNotFound();
		}
		catch(Exception $e)
		{
			return $this->respondBadRequest($e->getMessage());
		}
	}

}