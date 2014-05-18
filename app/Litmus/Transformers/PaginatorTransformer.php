<?php namespace Aaronbullard\Litmus\Transformers;

use Illuminate\Pagination\Paginator;
use Aaronbullard\Api\Transformer;

class PaginatorTransformer extends Transformer{

	public function transform($paginator)
	{
		return $this->transformPaginator($paginator);
	}

	private function transformPaginator(Paginator $paginator)
	{
		$array = $paginator->toArray();
		unset($array['data']);

		// Add pagination info
		$current_page 	= $paginator->getCurrentPage();
		$next_page 		= min($current_page + 1, $paginator->getLastPage());
		$previous_page 	= max($current_page - 1, 1);
		
		$array['next_page']		= $next_page === $current_page ? NULL : $paginator->getUrl($next_page);
		$array['previous_page'] = $previous_page === $current_page ? NULL : $paginator->getUrl($previous_page);

		return $array;
	}

}