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
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$colors = $this->color->all();

		return View::make('colors.index', compact('colors'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('colors.create');
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

			return Redirect::route('colors.index');
		}

		return Redirect::route('colors.create')
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

		return View::make('colors.show', compact('color'));
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
			return Redirect::route('colors.index');
		}

		return View::make('colors.edit', compact('color'));
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

			return Redirect::route('colors.show', $id);
		}

		return Redirect::route('colors.edit', $id)
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

		return Redirect::route('colors.index');
	}

}
