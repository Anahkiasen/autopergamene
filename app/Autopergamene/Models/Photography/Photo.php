<?php
namespace Autopergamene\Models\Photography;

use Autopergamene\Abstracts\AbstractModel;
use HTML;

/**
 * A Photo in a Photoset
 */
class Photo extends AbstractModel
{
	/**
	 * Aliases for sizes
	 *
	 * @type array
	 */
	private static $sizes = array(
		'square'       => 's',
		'large_square' => 'q',
		'thumbnail'    => 't',
		'small'        => 'n',
		'medium'       => '',
		'medium_large' => 'z',
		'large'        => 'b',
		'original'     => 'o',
	);

	////////////////////////////////////////////////////////////////////
	/////////////////////////// RELATIONSHIPS //////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * The Photoset the Photo's in
	 *
	 * @return Photoset
	 */
	public function photoset()
	{
		return $this->belongsTo('Autopergamene\Models\Photography\Photoset');
	}

	// Sizes --------------------------------------------------------- /

	/**
	 * Get the URL to a photo
	 */
	public function size($size)
	{
		$size  = static::$sizes[$size];
		$image = $size
			? $this->farm.'_'.$size
			: $this->farm;

		return $image.'.jpg';
	}

	/**
	 * Dynamic size getting
	 */
	public function __get($method)
	{
		// Get a size
		if (isset(static::$sizes[$method])) {
			return $this->size($method);
		}

		return parent::__get($method);
	}

	/**
	 * Check if a size is set
	 *
	 * @param  string $method
	 *
	 * @return boolean
	 */
	public function __isset($method)
	{
		if (isset(static::$sizes[$method])) {
			return true;
		}

		return parent::__isset($method);
	}

	////////////////////////////////////////////////////////////////////
	///////////////////////////// ATTRIBUTES ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Format a photo's index
	 */
	public function index($key)
	{
		$padding = 2 - strlen($key);
		$padding = ($padding > 0) ? str_repeat('0', $padding) : '';

		return $padding.$key;
	}

	/**
	 * Render the photo
	 *
	 * @return string
	 */
	public function __toString()
	{
		return HTML::image($this->large_square, $this->surname);
	}
}
