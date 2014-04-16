<?php

class AccountsController extends BaseController {

	/**
	 * Account Repository
	 *
	 * @var Account
	 */
	protected $account;

	public function __construct(Account $account)
	{
		$this->account = $account->where('user_id', '=', Auth::user()->id);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$accounts = $this->account->get();

		return View::make('accounts.index', compact('accounts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('accounts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input 				= Input::all();
		$input['user_id'] 	= Auth::user()->id;
		$input['account'] 	= md5(Auth::user()->getFullName().time());
		$input['token']		= md5($input['account'].json_encode(Input::all()));

		$validation = Validator::make($input, Account::$rules);

		if ($validation->passes())
		{
			Account::create($input);
			return Redirect::route('accounts.index');
		}

		return Redirect::route('accounts.create')
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
		$this->account->find($id)->delete();

		return Redirect::route('accounts.index');
	}

}
