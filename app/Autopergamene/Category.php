<?php
namespace Autopergamene;

use HTML;
use URL;

/**
 * A media Category
 */
class Category extends BaseModel
{
  use Traits\HasSlugId;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'categories';

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// RELATIONSHIPS //////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get all articles in a Category
   *
   * @return Collection
   */
  public function articles()
  {
    return $this->hasMany('Autopergamene\Article')->orderBy('created_at', 'desc');
  }

  ////////////////////////////////////////////////////////////////////
  ///////////////////////////// ATTRIBUTES ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Whether the category points to an external link or not
   */
  public function isExternal()
  {
    return (bool) $this->getOriginal('link');
  }

  /**
   * Get a link to the category's content
   */
  public function getLinkAttribute()
  {
    // External link
    $link = $this->getOriginal('link');
    if ($link) {
      return $link;
    }

    return URL::action('CategoriesController@category', $this->id);
  }

  /**
   * Get the category's thumb
   */
  public function getThumbAttribute()
  {
    return HTML::image('app/img/categories/'.$this->id.'.jpg', $this->name);
  }
}
