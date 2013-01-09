<?php

class Category extends Eloquent
{
  protected $table = 'categories';

  // Attributes ---------------------------------------------------- /

  /**
   * Get a link to the category's content
   */
  public function getLink()
  {
    // External link
    $link = $this->getOriginal('link');
    if ($link) return $link;

    return URL::route('category', array('slug' => $this->id));
  }

  /**
   * Get the category's thumb
   */
  public function getThumb()
  {
    return HTML::image('app/img/categories/'.$this->id.'.jpg', $this->name);
  }
}