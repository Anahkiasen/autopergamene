<?php
namespace Autopergamene\Controllers;

use Autopergamene\Repositories\CategoriesRepository;
use Controller;
use View;

/**
 * Dispatches to various Category places
 */
class CategoriesController extends Controller
{
	/**
	 * The Category Repository
	 *
	 * @type CategoriesRepository
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
	public function index()
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
	public function show($slug)
	{
		$category = $this->categories->getBySlug($slug);

		return View::make('categories.'.$slug, array(
			'category' => $category,
			'articles' => $category->articles,
		));
	}
}
