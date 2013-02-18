<?php
class Collection extends Eloquent
{
  public function photosets()
  {
    return $this->belongsToMany('Photoset')->orderBy('created_at', 'desc');
  }
}