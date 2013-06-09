<?php
/**
 * ArticlesController
 *
 * Handles Articles display
 */
use Repositories\ArticleRepository;

class ArticlesController extends BaseController
{
  /**
   * Bind dependencies
   *
   * @param ArticleRepository $articles
   */
  public function __construct(ArticleRepository $articles)
  {
    $this->articles = $articles;
  }

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
    $article = $this->articles->getBySlug($articleSlug);

    return View::make('article')
      ->with('category', $article->category)
      ->with('article', $article);
  }
}
