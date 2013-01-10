<?php
class Illustration extends Eloquent
{

  protected $table = 'illustrations';

  // Relationships ------------------------------------------------- /

  public function support()
  {
    return $this->belongsTo('Support');
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Get a thumb of the illustration
   */
  public function thumb($folder)
  {
    $image = Thumb::square($folder.$this->image);

    return HTML::image($image);
  }

  /**
   * Display the illustration
   */
  public function image($folder)
  {
    return HTML::image($folder.$this->image);
  }
}