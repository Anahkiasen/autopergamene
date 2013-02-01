<?php
use Underscore\Parse;

class Article extends Eloquent
{
  /**
   * Get the imploded tags of the article
   *
   * @return string
   */
  public function giveTags()
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
  public function giveCreatedAt()
  {
    $date = $this->getOriginal('created_at');
    $date = new DateTime($date);

    return $date->format('m/d/y');
  }
}