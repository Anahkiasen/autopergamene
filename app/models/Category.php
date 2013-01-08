<?php

class Category extends Eloquent
{
  protected $table = 'categories';

  /**
   * Get the category's thumb
   */
  public function getThumb()
  {
    return HTML::image('app/img/categories/'.$this->id.'.jpg', $this->name);
  }
}