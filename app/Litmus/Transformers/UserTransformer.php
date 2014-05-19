<?php namespace Litmus\Transformers;

use User;
use Aaronbullard\Api\Transformer;

class UserTransformer extends Transformer{

	public function transform($user)
	{
		return $this->transformUser($user);
	}

	private function transformUser(User $user)
	{
		return $user->toArray();
	}

}