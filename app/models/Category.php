<?php

class Category extends Eloquent
{
  protected $table = 'categories';

  // Relationships ------------------------------------------------- /

  public function articles()
  {
    return $this->hasMany('Article')->orderBy('created_at', 'desc');
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Whether the category points to an external link or not
   */
  public function isExternal()
  {
    return !String::startsWith($this->link, URL::getRequest()->root());
  }

  /**
   * Get a link to the category's content
   */
  public function giveLink()
  {
    // External link
    $link = $this->getOriginal('link');
    if ($link) return $link;

    return URL::route('category', array('slug' => $this->id));
  }

  /**
   * Get the category's thumb
   */
  public function giveThumb()
  {
    return HTML::image('app/img/categories/'.$this->id.'.jpg', $this->name);
  }
}