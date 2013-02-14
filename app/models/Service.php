<?php
class Service extends Eloquent
{

  // Attributes ---------------------------------------------------- /

  /**
   * Get the service's link as styled name
   *
   * @return string
   */
  public function getLinkNameAttribute()
  {
    $linkName = String::remove($this->link, '/anahkiasen');
    $linkName = String::remove($linkName, 'http://');
    $linkName = String::remove($linkName, 'www.');

    return $linkName;
  }
}