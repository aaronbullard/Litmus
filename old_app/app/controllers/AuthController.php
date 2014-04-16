<?php

class AuthController extends BaseController {

	/**
	 * Display login page.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('auth.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function validate()
	{
		if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password')], true))
		{
			return Redirect::route('accounts.index')->with('message', 'Welcome, '.Auth::user()->getFullName().'!');
		}

		Auth::logout();
		return Redirect::back()
			->withInput()
			->with('message', 'User credentials failed.  Please try again or '.link_to_route('users.create', "SIGN UP."));
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

}
