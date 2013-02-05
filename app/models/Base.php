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
   * Get formatted creation date
   */
  public function giveCreatedAt()
  {
    $date = $this->getOriginal('created_at');
    $date = String::find($date, '-') ? new DateTime($date) : DateTime::createFromFormat('U', $date);

    return $date->format('Y-m-d');
  }
}