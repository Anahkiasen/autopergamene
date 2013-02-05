<?php
/**
 * CategoryRepository
 *
 * Fetches Categories from the database
 */
namespace Repositories;

use \Category as CategoryEntity;

class CategoryRepository
{
  // Global access points ------------------------------------------ /

  /**
   * Get all categories in a predefined order
   *
   * @return Collection
   */
  public function getOrdered()
  {
    return CategoryEntity::orderBy('order', 'asc')->get();
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
    return CategoryEntity::find($slug);
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