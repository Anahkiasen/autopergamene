<?php
use Underscore\Parse;

class Article extends Base
{

  // Relationships ------------------------------------------------- /

  public function category()
  {
    return $this->belongsTo('Category');
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Get the link to the Article
   *
   * @return string
   */
  public function getLinkAttribute()
  {
    return URL::route('article', array(
      'categorySlug' => $this->category->id,
      'articleSlug'  => $this->slug));
  }

  /**
   * Get the imploded tags of the article
   *
   * @return string
   */
  public function getTagsAttribute()
  {
    $tags = $this->getOriginal('tags');
    $tags = Parse::fromJSON($tags);

    return implode(', ', $tags);
  }

  /**
   * Human-er date for articles
   *
   * @return string
   */
  public function getCreatedAtAttribute()
  {
    $date = $this->getOriginal('created_at');
    $date = new DateTime($date);

    return $date->format('m/d/y');
  }
}