<?php
class Illustration extends Base
{

  // Relationships ------------------------------------------------- /

  public function support()
  {
    return $this->belongsTo('Support');
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Get a thumb of the illustration
   */
  public function thumb($folder, $name = null)
  {
    $image = Thumb::square($folder.$this->image, 200);
    if (!$name) $name = $this->name;

    return $image->alt($name);
  }

  /**
   * Display the illustration
   */
  public function image($folder)
  {
    return HTML::lazyLoad($folder.$this->image, $this->name);
  }
}