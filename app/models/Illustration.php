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
    $path  = 'public/'.$folder.$this->image;
    $cache = 'cache/'.md5($this->image).'.jpg';

    // Create thumb if it doesn't exist
    if (!file_exists('public/'.$cache)) {
      $thumb = new Imagine;
      $box = new Box(200, 200);
      $thumb = $thumb
        ->open(URL::asset($folder.$this->image))
        ->thumbnail($box)->crop(new Point(0, 0), $box)
        ->save($cache);
    }

    return HTML::image($cache);
  }

  /**
   * Display the illustration
   */
  public function image($folder)
  {
    return HTML::image($folder.$this->image);
  }
}