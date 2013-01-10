<?php
class Base extends Eloquent
{
  // Fetchers ------------------------------------------------------ /

  /**
   * Get tableaux by latest first
   */
  public static function latest()
  {
    return static::orderBy('created_at', 'desc')->get();
  }

  /**
   * Get a category from its slug
   */
  public static function fromSlug($slug)
  {
    return static::where('slug', $slug)->first();
  }

  // Attributes ---------------------------------------------------- /

  public function getSlug()
  {
    return String::slugify($this->name);
  }

  public function getDateOfCreation()
  {
    $date = new DateTime($this->created_at);

    return $date->format('Y-m-d');
  }
}