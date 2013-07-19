<?php
namespace Autopergamene\Repositories;

use Autopergamene\Photography\Photoset;

/**
 * Fetches Categories from the database
 */
class PhotosetsRepository
{
  /**
   * Get a Photoset by its slug
   *
   * @param string $slug The slug
   *
   * @return Photoset
   */
  public function getBySlug($slug)
  {
    return Photoset::where('slug', $slug)->first();
  }
}
