<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Litmus\Exceptions\ValidationException;
use Litmus\Transformers\UserTransformer;
use Litmus\Transformers\PaginatorTransformer;

class UserController extends \BaseController {

	protected $transformer;

	public function __construct(UserTransformer $transformer)
	{
		parent::__construct();
		$this->transformer = $transformer;

		if(Request::segment(2) !== Auth::id())
		{
			return $this->respondUnauthorized();
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
			$user 			= new User;
			$user->email 	= Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->validate()->save();

			Auth::loginUsingId($user->id);

			return $this->respondCreated([
				'data' => $this->transformer->transform($user)
			]);
		}
		catch(ValidationException $e)
		{
			return $this->respondFormValidation($e->getMessage());
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
			return $this->respondFormValidation($e->getMessage());
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