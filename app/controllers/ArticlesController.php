<?php
use Autopergamene\Article;
use Autopergamene\Repositories\CategoriesRepository;

/**
 * Handles Articles display
 */
class ArticlesController extends BaseController
{
	/**
	 * The Category
	 *
	 * @var Category
	 */
	protected $category;

	/**
	 * The Article Repository
	 *
	 * @var Article
	 */
	protected $articles;

	/**
	 * Bind dependencies
	 *
	 * @param CategoriesRepository $categories
	 * @param Article              $articles
	 */
	public function __construct(CategoriesRepository $categories, Article $articles)
	{
		$this->category = $categories->getBySlug('en-averse-dencre');
		$this->articles = $articles;
	}

	/**
	 * Display all articles
	 *
	 * @return View
	 */
	public function articles()
	{
		return View::make('categories.articles', array(
			'category' => $this->category,
			'articles' => $this->articles->all(),
		));
	}

	/**
	 * Display an article
	 *
	 * @param $slug
	 *
	 * @internal param string $categorySlug The category slug
	 * @internal param string $articleSlug The article slug
	 *
	 * @return View
	 */
	public function article($slug)
	{
		return View::make('categories.subcategories.article', array(
			'category' => $this->category,
			'article'  => $this->articles->whereSlug($slug)->firstOrFail(),
		));
	}
}
