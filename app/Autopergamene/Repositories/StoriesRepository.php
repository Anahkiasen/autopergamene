<?php
namespace Autopergamene\Repositories;

use Autopergamene\Story;

/**
 * Fetches Categories from the database
 */
class StoriesRepository
{
  /**
   * Get a Story by its slug
   *
   * @param string $slug The slug
   *
   * @return Story
   */
  public function getBySlug($slug)
  {
    return Story::where('slug', $slug)->first();
  }
}
