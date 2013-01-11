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
    $format = strlen($this->created_at) == 10 ? 'U' : 'Y-m-d H:i:s';
    $date = DateTime::createFromFormat($format, $this->created_at);

    return $date->format('Y-m-d');
  }
}