<?php
use Autopergamene\Repositories\CollectionsRepository;
use Autopergamene\Repositories\CategoriesRepository;
use Autopergamene\Repositories\PhotosetsRepository;
use Autopergamene\Photography\Photo;

/**
 * Controller for the photographies
 */
class PhotographiesController extends BaseController
{
	public function __construct(CategoriesRepository $categories, CollectionsRepository $collections, PhotosetsRepository $photosets, Photo $photos)
	{
		$this->categories  = $categories;
		$this->collections = $collections;
		$this->photosets   = $photosets;
		$this->photos      = $photos;

		$this->category = $categories->getBySlug('memorabilia');
	}

	/**
	 * Display all collections
	 *
	 * @return View categories/memorabilia
	 */
	public function collections()
	{
  	$collections = $this->collections->get();

  	return View::make('categories.memorabilia', array(
			'collections' => $collections,
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
		$photoset = $this->photosets->getBySlug($slug);

		return View::make('categories.subcategories.photoset', array(
			'photoset' => $photoset,
			'category' => $this->category,
  	));
	}
}