<?php
namespace Autopergamene\Controllers;

use Autopergamene\Repositories\CategoriesRepository;
use Autopergamene\Repositories\RepositoriesRepository;
use Controller;
use View;

class RepositoriesController extends Controller
{
	/**
	 * The Category
	 *
	 * @type Category
	 */
	protected $category;

	/**
	 * The Repositories Repository
	 *
	 * @type RepositoriesRepository
	 */
	protected $repositories;

	/**
	 * Build a new SupportsController
	 *
	 * @param CategoriesRepository   $categories
	 * @param RepositoriesRepository $repositories
	 */
	public function __construct(CategoriesRepository $categories, RepositoriesRepository $repositories)
	{
		$this->repositories = $repositories;
		$this->category     = $categories->getBySlug('graceful-degradation');
	}

	/**
	 * Display all Repositories
	 *
	 * @return View
	 */
	public function index()
	{
		return View::make('categories.repositories', array(
			'category'     => $this->category,
			'articles'     => $this->category->articles,
			'repositories' => $this->repositories->getOrderedRepositories(),
		));
	}
}
