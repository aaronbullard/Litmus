<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Aaronbullard\Litmus\Exceptions\ValidationException;
use Aaronbullard\Litmus\Transformers\PaletteTransformer;

class PaletteController extends \BaseController {

	protected $transformer;

	public function __construct(PaletteTransformer $transformer)
	{
		$this->transformer = $transformer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try{
			$palettes = Palette::all();

			return $this->respondOK([
				'data' => $this->transformer->transformArray($palettes->toArray())
			]);	
		}
		catch(Exception $e)
		{
			return $this->respondBadRequest();
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
			$palette = (new Palette)->fill(Input::all());
			$palette->account_id = 1;
			$palette->user_id = 1;
			$palette->validate();
			$palette->save();

			return $this->respondCreated([
				'data' => $this->transformer->transform($palette)
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
	public function show($id)
	{
		try{
			$palette = Palette::findOrFail($id);

			return $this->respondOK([
				'data' => $this->transformer->transform($palette)
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		try{
			$palette = Palette::findOrFail($id);
			$palette->fill(Input::all());
			$palette->validate();
			$palette->save();

			return $this->respondOK([
				'data' => $this->transformer->transform($palette)
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