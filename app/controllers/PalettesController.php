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
		$account_ids = Auth::user()->accounts->lists('id');
		$this->palette 	= $palette->whereIn('account_id', $account_ids);
		$this->namespace = 'palettes';
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$palettes = $this->palette->get();

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
		$input['user_id'] = Auth::user()->id;

		$validation = Validator::make($input, Palette::$rules);

		if ($validation->passes()  && Account::find($input['account_id'])->isMember(Auth::user()) )
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
	public function show(Palette $palette)
	{
		return View::make($this->namespace.'.show', compact('palette'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Palette $palette)
	{
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
	public function update(Palette $palette)
	{
		$input = array_except(Input::all(), '_method');
		$input['user_id'] = Auth::user()->id;
		$validation = Validator::make($input, Palette::$rules);

		if ($validation->passes() && Account::find($input['account_id'])->isMember(Auth::user()))
		{
			$palette->update($input);
			return Redirect::route($this->namespace.'.show', $palette->id);
		}

		return Redirect::back()
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Palette Palette
	 * @return Response
	 */
	public function destroy(Palette $palette)
	{
		$palette->delete();
		return Redirect::route($this->namespace.'.index');
	}

}
