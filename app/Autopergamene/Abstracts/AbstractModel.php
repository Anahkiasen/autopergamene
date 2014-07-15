<?php
namespace Autopergamene\Abstracts;

use Arrounded\Traits\JsonAttributes;
use Autopergamene\Query;
use Polyglot\Polyglot;

/**
 * An abstract Model to extend
 */
abstract class AbstractModel extends Polyglot
{
	use JsonAttributes;

	////////////////////////////////////////////////////////////////////
	/////////////////////////////// FETCHERS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get where thumbnails only
	 *
	 * @param Query $query
	 *
	 * @return  Query
	 */
	public static function scopeThumbnails($query)
	{
		return $query->where('thumbnail', 1);
	}
}
