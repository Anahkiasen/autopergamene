<?php
namespace Autopergamene\Models\Photography;

use Autopergamene\Abstracts\AbstractModel;

/**
 * An album of Photos
 */
class Photoset extends AbstractModel
{
	////////////////////////////////////////////////////////////////////
	/////////////////////////// RELATIONSHIPS //////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the Photoset's Photos
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function photos()
	{
		return $this->hasMany('Autopergamene\Models\Photography\Photo')->orderBy('name', 'asc');
	}

	/**
	 * Get the thumbnail for the Photoset
	 *
	 * @return Photo
	 */
	public function thumbnail()
	{
		return $this->hasOne('Autopergamene\Models\Photography\Photo')->thumbnails();
	}
}
