<?php
use Underscore\Parse;

class Article extends Eloquent
{
  public function giveTags()
  {
    $tags = $this->getOriginal('tags');
    $tags = Parse::fromJSON($tags);

    return implode(', ', $tags);
  }
}