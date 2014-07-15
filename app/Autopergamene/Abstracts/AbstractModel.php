<?php
namespace Autopergamene\Abstracts;

use Autopergamene\Query;
use Polyglot\Polyglot;

/**
 * An abstract Model to extend
 */
abstract class AbstractModel extends Polyglot
{
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
