<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Litmus\Exceptions\ValidationException;
use Litmus\Transformers\ImageTransformer;
use Litmus\Transformers\PaginatorTransformer;
use Litmus\Commands\ImageColorAnalysisFacade as ImageColorAnalysis;

class ImageController extends \BaseController {

	protected $transformer;
	protected $paginatorTransformer;

	public function __construct(ImageTransformer $transformer, PaginatorTransformer $paginatorTransformer)
	{
		parent::__construct();
		$this->transformer 			= $transformer;
		$this->paginatorTransformer = $paginatorTransformer;

		$this->validateOwnership(new Image);	
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
			$file = Input::file('image');
			$size = $file->getSize();
			$mime = $file->getMimeType();

			$v = Validator::make(
				[	'image' => $file,
					'filesize' => $size
				], [
					'image' 	=> 'image|mimes:jpeg',
					'filesize'	=> 'max:10000000' // 10MB
				]);
			if( $v->fails() )
			{
				throw new ValidationException($v->messages()->first('image'));
			}

			// Save image and location to DB, get id, post job
			$user_id 			= Auth::id();
			$image 				= new Image;
			$image->path 		= storage_path().'/images/'.$user_id;
			$image->filename 	= time().'_'.Input::file('image')->getClientOriginalName();
			$image->mime 		= $mime;
			$image->parameters 	= Input::has('bbox') ? (new Litmus\Entities\Box(Input::get('bbox')))->toJson() : NULL;
			$image->callback 	= Input::has('callback') ? Input::get('callback') : NULL;
			$image->user_id		= Auth::id();

			$image->setStatus('queued');
			$image->validate()->save();

			// Move image for storage
			$file->move($image->path, $image->filename);

			if( Input::has('queue') && !Input::get('queue') )
			{
				// Process Image immediately
				$command = ImageColorAnalysis::create($image->id);
				$command->execute();
				return $this->setRedirection(URL::route('images.show', $image->id))
							->respondCreated([
								'data'	=> $this->transformer->transform(Image::findOrFail($image->id))
							]);
			}
			else
			{
				// Send image for processing to queue
				Queue::push('Litmus\Workers\ImageColorAnalysisWorker', ['image_id' => $image->id]);
				
				// Respond with image id for reference
				return $this->setRedirection(URL::route('images.show', $image->id))
							->respondCreated([
								'data'	=> $this->transformer->transform($image)
							]);

			}
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