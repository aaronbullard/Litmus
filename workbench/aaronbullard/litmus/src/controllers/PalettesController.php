<?php

class PalettesController extends BaseController {

	/**
	 * Palette Repository
	 *
	 * @var Palette
	 */
	protected $palette;

	public function __construct(Palette $palette)
	{
		$this->palette = $palette;
		$this->namespace = 'litmus::palettes';
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$palettes = $this->palette->all();

		return View::make($this->namespace.'.index', compact('palettes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make($this->namespace.'.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Palette::$rules);

		if ($validation->passes())
		{
			$this->palette->create($input);

			return Redirect::route($this->namespace.'.index');
		}

		return Redirect::route($this->namespace.'.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$palette = $this->palette->findOrFail($id);

		return View::make($this->namespace.'.show', compact('palette'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$palette = $this->palette->find($id);

		if (is_null($palette))
		{
			return Redirect::route($this->namespace.'.index');
		}

		return View::make($this->namespace.'.edit', compact('palette'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Palette::$rules);

		if ($validation->passes())
		{
			$palette = $this->palette->find($id);
			$palette->update($input);

			return Redirect::route($this->namespace.'.show', $id);
		}

		return Redirect::route($this->namespace.'.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->palette->find($id)->delete();

		return Redirect::route($this->namespace.'.index');
	}

}
