<?php
class Tableau extends Base
{
  protected $table = 'tableaux';

  // Attributes ---------------------------------------------------- /

  /**
   * Get full path to the image
   */
  public function getImage()
  {
    $image = String::slugify($this->name).'.jpg';

    return URL::asset("app/img/tableaux/".$image);
  }

  /**
   * Get formatted creation date
   */
  public function getCreatedAt()
  {
    $date = $this->getOriginal('created_at');
    $date = new DateTime($date);

    return $date->format('Y-m-d');
  }

  /**
   * Prints out a tableau
   */
  public function __toString()
  {
    return HTML::image($this->image, $this->name);
  }
}