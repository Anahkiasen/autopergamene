<?php
namespace Autopergamene\Repositories;

use Arrounded\Abstracts\AbstractRepository;
use Autopergamene\Models\Illustration\Support;

class SupportsRepository extends AbstractRepository
{
	/**
	 * @param Support $items
	 */
	public function __construct(Support $items)
	{
		$this->items = $items;
	}
}

