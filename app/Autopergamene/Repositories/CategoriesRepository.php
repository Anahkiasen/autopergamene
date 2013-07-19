<?php
namespace Autopergamene\Repositories;

use Autopergamene\Category;

/**
 * Fetches Categories from the database
 */
class CategoriesRepository
{
  // Global access points ------------------------------------------ /

  /**
   * Get all categories in a predefined order
   *
   * @return Collection
   */
  public function getOrdered()
  {
    return Category::orderBy('order', 'asc')->get();
  }

  /**
   * Get a Category by its slug
   *
   * @param string $slug The slug
   *
   * @return Category
   */
  public function getBySlug($slug)
  {
    return Category::find($slug);
  }
}
