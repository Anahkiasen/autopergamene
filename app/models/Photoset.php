<?php
class Photoset extends Base
{
  // Relationships ------------------------------------------------- /

  public function photos()
  {
    return $this->hasMany('Photo')->orderBy('name', 'asc');
  }

  public function thumbnail()
  {
    return $this->hasOne('Photo')->where('thumbnail', 1);
  }

  // Fetchers ------------------------------------------------------ /

  /**
   * Get photosets by latest first
   */
  public static function latest()
  {
    return static::with(array(
      'thumbnail' => function($query) {
        return $query->where('thumbnail', 1);
      }))->orderBy('created_at', 'desc')->get();
  }
}
