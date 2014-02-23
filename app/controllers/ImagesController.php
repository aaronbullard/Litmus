<?php

class ImagesController extends BaseController {

	/**
	 * Image Repository
	 *
	 * @var Image
	 */
	protected $image;

	public function __construct(Image $image)
	{
		$this->image = $image;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Account $account)
	{
		
		$images = $account->images()->get();

		return Response::json([
				'status' => ['message' => 'OK', 'code' => 1],
				'data'	 => $images->toArray(),
				'meta'	 => []
			], 200);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Account $account)
	{
		$input 		= Input::all();
		$validation = Validator::make($input, Image::$rules);

		if ($validation->passes())
		{
			$image = Image::fill($input);
			$account->images()->save($image);

			Event::fire('image.process', $image);

			return Response::json([
				'status' => ['message' => 'Created', 'code' => 1],
				'data'	 => $image->toArray(),
				'meta'	 => []
			], 201);
		}

		return Response::json([
				'status' => ['message' => 'Not Acceptable', 'code' => 2],
				'data'	 => [],
				'meta'	 => [
					'errors' => $image->errors()->all()
				]
			], 406);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Account $account, $token, $image_id)
	{
		$image = $account->images()->findOrFail($image_id);

		if( $image )
		{
			return Response::json([
					'status' => ['message' => 'OK', 'code' => 1],
					'data'	 => $image->toArray(),
					'meta'	 => []
				], 200);	
		}

		return Response::json([
				'status' => ['message' => 'Not Found', 'code' => 2],
				'data'	 => [],
				'meta'	 => [
					'errors' => "The resource you requested was not found."
				]
			], 404);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Account $account, $token, $image_id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Image::$rules);

		if ($validation->passes())
		{
			$image = $account->image->find($image_id);
			$image->update($input);

			return Response::json(NULL, 204);
		}

		return Response::json([
				'status' => ['message' => 'Not Acceptable', 'code' => 2],
				'data'	 => $image->toArray(),
				'meta'	 => [
					'errors' => $image->errors()->all()
				]
			], 406);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Account $account, $token, $image_id)
	{
		$image = $account->image->find($image_id);
		if( $image )
		{
			$image->delete();
			return Response::json(NULL, 204);
		}

		return Response::json([
				'status' => ['message' => 'Not Found', 'code' => 2],
				'data'	 => [],
				'meta'	 => [
					'errors' => "The resource you requested was not found."
				]
			], 404);
	}

}
