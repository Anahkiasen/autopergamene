<?php
/**
 * ArticleRepository
 *
 * Fetches Categories from the database
 */
namespace Repositories;

use \Article as ArticleEntity;

class ArticleRepository
{
  /**
   * Get a Article by its slug
   *
   * @param string $slug The slug
   *
   * @return Article
   */
  public function getBySlug($slug)
  {
    return ArticleEntity::where('slug', $slug)->first();
  }
}
