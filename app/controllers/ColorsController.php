<?php

class ColorsController extends BaseController {

	/**
	 * Color Repository
	 *
	 * @var Color
	 */
	protected $color;

	public function __construct(Color $color)
	{
		$this->color = $color;
		$this->namespace = "colors";
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($palette_id)
	{
		$colors = $this->color->with('palette')->wherePaletteId($palette_id)->get();

		return View::make($this->namespace.'.index', compact('colors'));
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
		$validation = Validator::make($input, Color::$rules);

		if ($validation->passes())
		{
			$this->color->create($input);

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
		$color = $this->color->findOrFail($id);

		return View::make($this->namespace.'.show', compact('color'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$color = $this->color->find($id);

		if (is_null($color))
		{
			return Redirect::route($this->namespace.'.index');
		}

		return View::make($this->namespace.'.edit', compact('color'));
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
		$validation = Validator::make($input, Color::$rules);

		if ($validation->passes())
		{
			$color = $this->color->find($id);
			$color->update($input);

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
		$this->color->find($id)->delete();

		return Redirect::route($this->namespace.'.index');
	}

}
