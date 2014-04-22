<?php namespace Aaronbullard\Litmus\Transformers;

use User;
use Aaronbullard\Api\Transformer;

class UserTransformer extends Transformer{

	public function transform($user)
	{
		return $this->transformUser($user);
	}

	private function transformUser(User $user)
	{
		return [
			'id'			=> (int)$user['id'],
			'email'			=> $user->email,
			'first_name'	=> $user->firstname,
			'last_name'		=> $user->lastname,
			'full_name'		=> $user->getFullName(),
			'street'		=> $user->street,
			'city'			=> $user->city,
			'state'			=> $user->state,
			'zipcode'		=> $user->zipcode,
			'phone'			=> $user->phone,
			'created_at'	=> $user->created_at
		];
	}

}