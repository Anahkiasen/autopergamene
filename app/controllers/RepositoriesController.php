<?php
use Autopergamene\Repositories\CategoriesRepository;
use Autopergamene\Repository;

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
	 * @type Repository
	 */
	protected $repositories;

	/**
	 * Build a new IllustrationsController
	 *
	 * @param CategoriesRepository $categories
	 * @param Repository           $repositories
	 */
	public function __construct(CategoriesRepository $categories, Repository $repositories)
	{
		$this->repositories = $repositories;
		$this->category     = $categories->getBySlug('graceful-degradation');
	}

	/**
	 * Display all Repositories
	 *
	 * @return View
	 */
	public function repositories()
	{
		return View::make('categories.repositories', array(
			'category'     => $this->category,
			'articles'     => $this->category->articles,
			'repositories' => $this->repositories->orderBy('order')->get(),
		));
	}
}
