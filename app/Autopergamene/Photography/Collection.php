<?php
namespace Autopergamene\Photography;

use Autopergamene\BaseModel;

/**
 * A Collection of Photosets
 */
class Collection extends BaseModel
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'collections';

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
		return $this->belongsToMany('Autopergamene\Photography\Photoset')->orderBy('created_at', 'desc');
	}
}
