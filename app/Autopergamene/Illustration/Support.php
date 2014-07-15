<?php
namespace Autopergamene\Illustration;

use Autopergamene\Abstracts\AbstractModel;
use Autopergamene\Traits\HasSlugId;

/**
 * A Support holding various Illustrations
 */
class Support extends AbstractModel
{
	use HasSlugId;

	////////////////////////////////////////////////////////////////////
	/////////////////////////// RELATIONSHIPS //////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the Support's Illustrations
	 *
	 * @return Collectino
	 */
	public function illustrations()
	{
		return $this->hasMany('Autopergamene\Illustration\Illustration');
	}

	/**
	 * Get the Support's Thumbnail
	 *
	 * @return Illuminage
	 */
	public function thumbnail()
	{
		return $this->hasOne('Autopergamene\Illustration\Illustration')->thumbnails();
	}

	////////////////////////////////////////////////////////////////////
	///////////////////////////// ATTRIBUTES ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the folder of this support's illustrations
	 */
	public function getFolderAttribute()
	{
		return 'app/img/illustrations/'.$this->id.'/';
	}
}
