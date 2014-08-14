<?php
namespace Autopergamene\Controllers;

use Autopergamene\Models\Illustration\Support;
use Autopergamene\Repositories\CategoriesRepository;
use Autopergamene\Repositories\SupportsRepository;
use Controller;
use View;

class SupportsController extends Controller
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
	 * @type SupportsRepository
	 */
	protected $supports;

	/**
	 * Build a new SupportsController
	 *
	 * @param CategoriesRepository $categories
	 * @param SupportsRepository   $supports
	 */
	public function __construct(CategoriesRepository $categories, SupportsRepository $supports)
	{
		$this->supports = $supports;
		$this->category = $categories->getBySlug('illustration');
	}

	/**
	 * Display all Supports
	 *
	 * @return View categories.illustration
	 */
	public function index()
	{
		return View::make('categories.illustration', array(
			'category' => $this->category,
			'supports' => $this->supports->items()->with('thumbnail')->get(),
		));
	}

	/**
	 * Display a Support
	 *
	 * @param Support $support
	 *
	 * @return View categories.subcategories.support
	 */
	public function show(Support $support)
	{
		return View::make('categories.subcategories.support', array(
			'category' => $this->category,
			'support'  => $support,
		));
	}
}
