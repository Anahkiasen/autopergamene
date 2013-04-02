<?php
class Base extends Eloquent
{
  // Fetchers ------------------------------------------------------ /

  /**
   * Get tableaux by latest first
   */
  public static function scopeLatest($query)
  {
    return $query->orderBy('created_at', 'desc');
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Get formatted creation date
   */
  public function getCreatedAtAttribute()
  {
    $date = $this->getOriginal('created_at');
    $date = String::find($date, '-') ? new DateTime($date) : DateTime::createFromFormat('U', $date);

    return $date->format('Y-m-d');
  }
}