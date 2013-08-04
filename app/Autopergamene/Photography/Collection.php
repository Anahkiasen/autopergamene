<?php
namespace Autopergamene\Photography;

use Autopergamene\BaseModel;

/**
 * A Collection of Photosets
 */
class Collection extends BaseModel
{
	////////////////////////////////////////////////////////////////////
	/////////////////////////// RELATIONSHIPS //////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get all the Photosets in a Collection
	 *
	 * @return Illuminate\Support\Collection
	 */
	public function photosets()
	{
		return $this->belongsToMany('Autopergamene\Photography\Photoset')->latest();
	}
}
