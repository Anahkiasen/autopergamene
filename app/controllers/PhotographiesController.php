<?php
use Autopergamene\Photography\Collection;
use Autopergamene\Photography\Photoset;
use Autopergamene\Repositories\CategoriesRepository;

/**
 * Controller for the photographies
 */
class PhotographiesController extends Controller
{
	/**
	 * The Category
	 *
	 * @var Category
	 */
	protected $category;

	/**
	 * The Collections Repository
	 *
	 * @var Collection
	 */
	protected $collections;

	/**
	 * The Photosets Repository
	 *
	 * @var Photoset
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
	public function collections()
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
	public function photoset($slug)
	{
		return View::make('categories.subcategories.photoset', array(
			'photoset' => $this->photosets->whereSlug($slug)->firstOrFail(),
			'category' => $this->category,
		));
	}
}
