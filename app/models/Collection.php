<?php

/**
 * A Collection of Photosets
 */
class Collection extends Eloquent
{

  /**
   * Get all the Photosets in a Collection
   *
   * @return Collection
   */
  public function photosets()
  {
    return $this->belongsToMany('Photoset')->orderBy('created_at', 'desc');
  }

}
