<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Aaronbullard\Litmus\Exceptions\ValidationException;
use Aaronbullard\Litmus\Transformers\UserTransformer;
use Aaronbullard\Litmus\Transformers\PaginatorTransformer;

class UserController extends \BaseController {

	protected $transformer;

	public function __construct(UserTransformer $transformer)
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
		//
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
			$user = (new User)->fill(Input::all());
			$user->password = Hash::make(Input::get('password'));
			$user->validate();
			$user->save();

			return $this->respondCreated([
				'data' => $this->transformer->transform($user)
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
			$user = User::findOrFail($id);

			return $this->respondOK([
				'data' => $this->transformer->transform($user)
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
			$user = User::findOrFail($id);
			$user->fill(Input::all());
			$user->validate();
			$user->save();

			return $this->respondOK([
				'data' => $this->transformer->transform($user)
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
			$user = User::findOrFail($id);
			$user->delete();

			return Redirect::route('users.index');
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