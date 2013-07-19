<?php
namespace Autopergamene\Repositories;

use Autopergamene\Photography\Collection;

/**
 * Fetches Collections from the database
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
		return Collection::with('photosets.thumbnail')->orderBy('created_at', 'desc')->get();
	}
}