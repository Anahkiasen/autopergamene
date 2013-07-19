<?php
namespace Autopergamene\Repositories;

use Autopergamene\Article;

/**
 * Fetches Categories from the database
 */
class ArticlesRepository
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
    return Article::where('slug', $slug)->first();
  }
}
