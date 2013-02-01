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
}