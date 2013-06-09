<?php

class BaseModel extends Eloquent
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

  ////////////////////////////////////////////////////////////////////
  ///////////////////////////// ATTRIBUTES ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get formatted creation date
   */
  public function getCreatedAtAttribute()
  {
    $date = $this->getOriginal('created_at');
    $date = String::find($date, '-') ? new Carbon($date) : Carbon::createFromTimestamp($date);

    return $date->format('Y-m-d');
  }

}
