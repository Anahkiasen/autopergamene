<?php
use Repositories\Articles;

/**
 * Handles Articles display
 */
class ArticlesController extends BaseController
{

  /**
   * The Article Repository
   *
   * @var Articles
   */
  protected $articles;

  /**
   * Bind dependencies
   *
   * @param Articles $articles
   */
  public function __construct(Articles $articles)
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
  public function article($categorySlug, $articleSlug)
  {
    $article = $this->articles->getBySlug($articleSlug);

    return View::make('article')
      ->with('category', $article->category)
      ->with('article', $article);
  }

}
