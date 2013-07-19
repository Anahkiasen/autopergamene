<?php
namespace Autopergamene;

use Carbon;
use Eloquent;
use Str;

/**
 * An abstract Model to extend
 */
abstract class BaseModel extends Eloquent
{
  ////////////////////////////////////////////////////////////////////
  /////////////////////////////// FETCHERS ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get by latest first
   */
  public static function scopeLatest($query)
  {
    return $query->orderBy('created_at', 'desc');
  }

  /**
   * Get where thumbnails only
   */
  public static function scopeThumbnails($query)
  {
    return $query->where('thumbnail', 1);
  }
}
