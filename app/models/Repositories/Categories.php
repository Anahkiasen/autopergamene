<?php
namespace Repositories;

use Category;

/**
 * Fetches Categories from the database
 */
class Categories
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

  // Specific fetchers --------------------------------------------- /

  /**
   * Get the category holding Photosets and Photos
   *
   * @return Category
   */
  public function getPhotosCategory()
  {
    return $this->getBySlug('memorabilia');
  }

  /**
   * Get the category holding Supports and Illustrations
   *
   * @return Category
   */
  public function getIllustrationsCategory()
  {
    return $this->getBySlug('illustration');
  }

  /**
   * Get the category holding Stories
   *
   * @return Category
   */
  public function getStoriesCategory()
  {
    return $this->getBySlug('les-fleurs-davril');
  }
}
