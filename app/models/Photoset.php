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
    return static::with('thumbnail')->latest()->get();
  }
}
