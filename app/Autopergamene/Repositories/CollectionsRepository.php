<?php
namespace Autopergamene\Repositories;

use Autopergamene\Photography\Collection;

/**
 * Repository for the Collections
 */
class CollectionsRepository
{
	/**
	 * Get all the Collections
	 *
	 * @return Collection
	 */
	public function get()
	{
		return Collection::with('photosets')->orderBy('created_at', 'desc')->get();
	}
}