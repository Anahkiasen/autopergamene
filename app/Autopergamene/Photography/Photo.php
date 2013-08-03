<?php
namespace Autopergamene\Photography;

use Autopergamene\BaseModel;
use HTML;

/**
 * A Photo in a Photoset
 */
class Photo extends BaseModel
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'photos';

	/**
	 * Aliases for sizes
	 *
	 * @var array
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
		return $this->belongsTo('Autopergamene\Photography\Photoset');
	}

	// Sizes --------------------------------------------------------- /

	/**
	 * Get the URL to a photo
	 */
	public function size($size)
	{
		$size = static::$sizes[$size];
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
