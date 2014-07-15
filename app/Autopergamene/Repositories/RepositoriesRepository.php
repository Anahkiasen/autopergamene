<?php
namespace Autopergamene\Repositories;

use Arrounded\Abstracts\AbstractRepository;
use Autopergamene\Models\Repository;

class RepositoriesRepository extends AbstractRepository
{
	/**
	 * @param Repository $items
	 */
	function __construct(Repository $items)
	{
		$this->items = $items;
	}

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getOrderedRepositories()
	{
		return $this->items()->orderBy('master', 'desc')->orderBy('order')->get();
	}
}
