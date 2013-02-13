<?php
/**
 * Categories
 *
 * Dispatches to various Category places
 */
use Repositories\CategoryRepository;

class CategoriesController extends BaseController
{
  /**
   * Bind dependencies
   *
   * @param CategoryRepository $categoriesRepository
   */
  public function __construct(CategoryRepository $categoriesRepository)
  {
    $this->categories = $categoriesRepository;
  }

  /**
   * Display all categories
   *
   * @return View home
   */
  public function getCategories()
  {
    $categories = $this->categories->getOrdered();

    return View::make('home')
      ->with('categories', $categories);
  }

  /**
   * Displays a Category
   *
   * @param string $categorySlug The Category slug
   *
   * @return View categories/$slug
   */
  public function getCategory($categorySlug)
  {
    $category = $this->categories->getBySlug($categorySlug);

    return View::make('categories.'.$categorySlug)
      ->with('category', $category);
  }

  /**
   * Display an album
   *
   * @param string $albumSlug The Photoset slug
   *
   * @return View photoset
   */
  public function getAlbum($albumSlug)
  {
    $photoset = Photoset::where('slug', $albumSlug)->first();
    $category = $this->categories->getPhotosCategory();

    return View::make('photoset')
      ->with('category', $category)
      ->with('photoset', $photoset);
  }

  /**
   * Display a Support
   *
   * @param string $supportSlug The Support slug
   *
   * @return View support
   */
  public function getSupport($supportSlug)
  {
    $support  = Support::with('illustrations')->find($supportSlug);
    $category = $this->categories->getIllustrationsCategory();

    return View::make('support')
      ->with('category', $category)
      ->with('support', $support);
  }

  /**
   * Display a Story
   *
   * @param string $storySlug The Story slug
   *
   * @return View story
   */
  public function getStory($storySlug)
  {
    $category = $this->categories->getStoriesCategory();
    $story = Story::find($storySlug);

    return View::make('story')
      ->with('category', $category)
      ->with('story', $story);
  }
}