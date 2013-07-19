<?php
use Autopergamene\Repositories\CategoriesRepository;
use Autopergamene\Repositories\CollectionsRepository;
use Autopergamene\Repositories\PhotosetsRepository;

/**
 * Controller for the photographies
 */
class PhotographiesController extends BaseController
{
	/**
	 * The CategoriesRepository
	 *
	 * @var CategoriesRepository
	 */
	protected $categories;

	/**
	 * The CollectionsRepository
	 *
	 * @var CollectionsRepository
	 */
	protected $collections;

	/**
	 * The PhotosetsRepository
	 *
	 * @var PhotosetsRepository
	 */
	protected $photosets;

	/**
	 * Build a new PhotographiesController
	 *
	 * @param CategoriesRepository  $categories
	 * @param CollectionsRepository $collections
	 * @param PhotosetsRepository   $photosets
	 */
	public function __construct(CategoriesRepository $categories, CollectionsRepository $collections, PhotosetsRepository $photosets)
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
  	return View::make('categories.memorabilia', array(
			'collections' => $this->collections->get(),
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
			'photoset' => $this->photosets->getBySlug($slug),
			'category' => $this->category,
  	));
	}
}