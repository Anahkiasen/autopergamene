<?php
namespace Repositories;

use Article as ArticleEntity;

/**
 * Fetches Categories from the database
 */
class Articles
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
