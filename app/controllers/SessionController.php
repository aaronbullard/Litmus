<?php

class SessionController extends \BaseController {


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('email', 'password');

		if (Auth::attempt($input))
		{
			return $this->respondOK([
				'data' => "You have succefully logged in."
			]);	
		}

		return $this->respondUnauthorized();
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id = NULL)
	{
		Auth::logout();

		return $this->respondOK([
			'data' => "You have succefully logged out."
		]);
	}

	public function logout()
	{
		return $this->destroy(Auth::id());
	}

}