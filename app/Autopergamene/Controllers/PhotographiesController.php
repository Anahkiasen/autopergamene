<?php
namespace Autopergamene\Controllers;

use Autopergamene\Models\Photography\Collection;
use Autopergamene\Models\Photography\Photoset;
use Autopergamene\Repositories\CategoriesRepository;
use Controller;
use View;

/**
 * Controller for the photographies
 */
class PhotographiesController extends Controller
{
	/**
	 * The Category
	 *
	 * @type Category
	 */
	protected $category;

	/**
	 * The Collections Repository
	 *
	 * @type Collection
	 */
	protected $collections;

	/**
	 * The Photosets Repository
	 *
	 * @type Photoset
	 */
	protected $photosets;

	/**
	 * Build a new PhotographiesController
	 *
	 * @param CategoriesRepository $categories
	 * @param Collection           $collections
	 * @param Photoset             $photosets
	 */
	public function __construct(CategoriesRepository $categories, Collection $collections, Photoset $photosets)
	{
		$this->collections = $collections;
		$this->photosets   = $photosets;
		$this->category    = $categories->getBySlug('memorabilia');
	}

	/**
	 * Display all collections
	 *
	 * @return View categories/memorabilia
	 */
	public function index()
	{
		return View::make('categories.collections', array(
			'collections' => $this->collections->with('photosets.thumbnail')->latest()->get(),
			'articles'    => $this->category->articles,
			'category'    => $this->category,
		));
	}

	/**
	 * Display a Photoset
	 *
	 * @param  string $slug
	 *
	 * @return View categories/subcategories/photoset
	 */
	public function show($slug)
	{
		return View::make('categories.subcategories.photoset', array(
			'photoset' => $this->photosets->whereSlug($slug)->firstOrFail(),
			'category' => $this->category,
		));
	}
}
