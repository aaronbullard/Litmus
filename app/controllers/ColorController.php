<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Aaronbullard\Litmus\Exceptions\ValidationException;
use Aaronbullard\Litmus\Transformers\ColorTransformer;
use Aaronbullard\Litmus\Transformers\PaginatorTransformer;

class ColorController extends \BaseController {

	protected $transformer;

	protected $paginatorTransformer;

	public function __construct(ColorTransformer $transformer, PaginatorTransformer $paginatorTransformer)
	{
		$this->transformer 			= $transformer;
		$this->paginatorTransformer = $paginatorTransformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($palette_id)
	{
		try{
			$colors = Color::where('palette_id', $palette_id)->paginate();

			return $this->respondOK([
				'data' => $this->transformer->transformArray($colors->getItems()),
				'meta' => $this->paginatorTransformer->transform($colors)
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
	public function store($palette_id)
	{
		try{
			$color = (new Color)->fill(Input::all());
			$color->palette_id = Input::has('palette_id') ? Input::get('palette_id') : $palette_id;
			$color->validate();
			$color->save();

			return $this->respondCreated([
				'data' => $this->transformer->transform($color)
			]);
		}
		catch(ValidationException $e)
		{
			return $this->respondNotAcceptable($e->getMessage());
		}
		catch(Exception $e)
		{
			return $this->respondBadRequest($e->getMessage());
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($palette_id, $color_id)
	{
		try{
			$color = Color::where('palette_id', $palette_id)->findOrFail($color_id);

			return $this->respondOK([
				'data' => $this->transformer->transform($color)
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
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($palette_id, $color_id)
	{
		try{
			$color = Color::where('palette_id', $palette_id)->findOrFail($color_id);
			$color->fill(Input::all());
			$color->validate();
			$color->save();

			return $this->respondOK([
				'data' => $this->transformer->transform($color)
			]);
		}
		catch(ModelNotFoundException $e)
		{
			return $this->respondNotFound();
		}
		catch(ValidationException $e)
		{
			return $this->respondNotAcceptable($e->getMessage());
		}
		catch(Exception $e)
		{
			return $this->respondBadRequest($e->getMessage());
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
			$palette = Palette::findOrFail($id);
			$palette->delete();

			return Redirect::route('palettes.index');
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