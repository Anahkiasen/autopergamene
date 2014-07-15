<?php
namespace Autopergamene\Illustration;

use Autopergamene\Abstracts\AbstractModel;
use HTML;
use Illuminage\Facades\Illuminage;

/**
 * An Illustration
 */
class Illustration extends AbstractModel
{
	////////////////////////////////////////////////////////////////////
	/////////////////////////// RELATIONSHIPS //////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the Support this Illustration belongs to
	 *
	 * @return Support
	 */
	public function support()
	{
		return $this->belongsTo('Autopergamene\Illustration\Support');
	}

	////////////////////////////////////////////////////////////////////
	///////////////////////////// ATTRIBUTES ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get a thumb of the illustration
	 */
	public function thumb($folder, $name = null)
	{
		$image = Illuminage::square($folder.$this->image, 200);
		if (!$name) {
			$name = $this->name;
		}

		return $image->alt($name);
	}

	/**
	 * Display the illustration
	 */
	public function image($folder)
	{
		return HTML::lazyLoad($folder.$this->image, $this->name);
	}
}
