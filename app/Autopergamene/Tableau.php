<?php
namespace Autopergamene;

use Autopergamene\Abstracts\AbstractModel;
use HTML;
use Str;
use URL;

/**
 * A Tableau in Today is Sunday
 */
class Tableau extends AbstractModel
{
	/**
	 * The table associated with the model.
	 *
	 * @type string
	 */
	protected $table = 'tableaux';

	////////////////////////////////////////////////////////////////////
	///////////////////////////// ATTRIBUTES ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get full path to the image
	 */
	public function getImageAttribute()
	{
		$image = Str::slug($this->name).'.jpg';

		return URL::asset("app/img/tableaux/".$image);
	}

	/**
	 * Prints out a tableau
	 */
	public function __toString()
	{
		return HTML::lazyLoad($this->image, $this->name);
	}
}
