<?php
class Tableau extends Base
{
  protected $table = 'tableaux';

  // Attributes ---------------------------------------------------- /

  /**
   * Get full path to the image
   */
  public function getImageAttribute()
  {
    $image = String::slugify($this->name).'.jpg';

    return URL::asset("app/img/tableaux/".$image);
  }

  /**
   * Prints out a tableau
   */
  public function __toString()
  {
    return HTML::lazyLoad($this->image, $this->name);
  }
}