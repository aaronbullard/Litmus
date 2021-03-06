<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Litmus\Exceptions\ValidationException;
use Litmus\Transformers\PaletteTransformer;
use Litmus\Transformers\PaginatorTransformer;

class PaletteController extends \BaseController {

	protected $transformer;

	protected $paginatorTransformer;

	public function __construct(PaletteTransformer $transformer, PaginatorTransformer $paginatorTransformer)
	{
		parent::__construct();
		$this->transformer 			= $transformer;
		$this->paginatorTransformer = $paginatorTransformer;

		$this->validateOwnership(new Palette);	
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		try{
			$palettes = Palette::paginate($this->limit);

			return $this->respondOK([
				'data' => $this->transformer->transformArray($palettes->getItems()),
				'meta' => $this->paginatorTransformer->transform($palettes)
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
			$palette = (new Palette)->fill(Input::all());
			$palette->user_id = Auth::id();
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