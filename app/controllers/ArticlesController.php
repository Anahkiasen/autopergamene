<?php
/**
 * ArticlesController
 *
 * Handles Articles display
 */
class ArticlesController extends BaseController
{
  /**
   * Display an article
   *
   * @param string $categorySlug The category slug
   * @param string $articleSlug  The article slug
   *
   * @return View article
   */
  public function getArticle($categorySlug, $articleSlug)
  {
    $article = Article::where('slug', $articleSlug)->first();

    return View::make('article')
      ->with('category', $article->category)
      ->with('article', $article);
  }
}