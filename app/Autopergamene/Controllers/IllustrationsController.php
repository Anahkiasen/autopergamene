<?php
namespace Autopergamene\Controllers;

use Autopergamene\Models\Illustration\Support;
use Autopergamene\Repositories\CategoriesRepository;
use Controller;
use View;

class IllustrationsController extends Controller
{
	/**
	 * The Category
	 *
	 * @type Category
	 */
	protected $category;

	/**
	 * The Support Repository
	 *
	 * @type Support
	 */
	protected $supports;

	/**
	 * Build a new IllustrationsController
	 *
	 * @param CategoriesRepository $categories
	 * @param Support              $supports
	 */
	public function __construct(CategoriesRepository $categories, Support $supports)
	{
		$this->supports = $supports;
		$this->category = $categories->getBySlug('illustration');
	}

	/**
	 * Display all Supports
	 *
	 * @return View categories.illustration
	 */
	public function supports()
	{
		return View::make('categories.illustration', array(
			'category' => $this->category,
			'supports' => $this->supports->with('thumbnail')->get(),
		));
	}

	/**
	 * Display a Support
	 *
	 * @param string $slug
	 *
	 * @return View categories.subcategories.support
	 */
	public function support($slug)
	{
		return View::make('categories.subcategories.support', array(
			'category' => $this->category,
			'support'  => $this->supports->findOrFail($slug),
		));
	}
}
