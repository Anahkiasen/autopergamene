<?php
use Autopergamene\Repositories\CategoriesRepository;

/**
 * Dispatches to various Category places
 */
class CategoriesController extends BaseController
{
	/**
	 * The Category Repository
	 *
	 * @var CategoriesRepository
	 */
	protected $categories;

	/**
	 * Bind dependencies
	 *
	 * @param CategoriesRepository $categories
	 */
	public function __construct(CategoriesRepository $categories)
	{
		$this->categories = $categories;
	}

	/**
	 * Display all categories
	 *
	 * @return View
	 */
	public function categories()
	{
		return View::make('home', array(
			'categories' => $this->categories->getOrdered(),
		));
	}

	/**
	 * Displays a Category
	 *
	 * @param string $slug
	 *
	 * @return View
	 */
	public function category($slug)
	{
		$category = $this->categories->getBySlug($slug);

		return View::make('categories.'.$slug, array(
			'category' => $category,
			'articles' => $category->articles,
		));
	}
}
