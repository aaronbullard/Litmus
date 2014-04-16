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
		$this->color 		= $color;
		$this->namespace 	= "colors";
		$this->route 		= "palettes.{palettes}.colors";
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Palette $palette)
	{
		return View::make($this->namespace.'.index', compact('palette'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Palette $palette)
	{
		return View::make($this->namespace.'.create', compact('palette'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Palette $palette)
	{
		$input = Input::all();
		$validation = Validator::make($input, Color::$rules);

		if ($validation->passes())
		{
			$this->color->create($input);

			return Redirect::route($this->route.'.index', $palette->id);
		}

		return Redirect::back()
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
	public function show(Palette $palette, Color $color)
	{
		return View::make($this->namespace.'.show', compact('color'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Palette $palette, Color $color)
	{
		if (is_null($color))
		{
			return Redirect::route($this->route.'.index', $palette->id);
		}

		return View::make($this->namespace.'.edit', compact('palette', 'color'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Palette $palette, Color $color)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Color::$rules);

		if ($validation->passes())
		{
			// $color = $this->color->find($id);
			$color->update($input);

			return Redirect::route($this->route.'.show', [$palette->id, $color->id]);
		}

		return Redirect::back()
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
	public function destroy(Palete $palette, Color $color)
	{
		// $color 		= $this->color->find($id);
		// $palette_id = $color->palette->id;

		$color->delete();

		return Redirect::route($this->namespace.'.index', $palette->id)
					->with('danger', "Color was deleted!");
	}

}
