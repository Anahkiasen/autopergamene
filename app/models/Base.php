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

  // Attributes ---------------------------------------------------- /

  /**
   * Get formatted date of creations
   *
   * @return string Y-m-d created_at field
   */
  public function getDateOfCreation()
  {
    $date = new DateTime($this->created_at);

    return $date->format('Y-m-d');
  }
}