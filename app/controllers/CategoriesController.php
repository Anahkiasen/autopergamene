<?php
use Repositories\Categories;

/**
 * Dispatches to various Category places
 */
class CategoriesController extends BaseController
{

  /**
   * The Category Repository
   *
   * @var Categories
   */
  protected $categories;

  /**
   * Bind dependencies
   *
   * @param Categories $categories
   */
  public function __construct(Categories $categories)
  {
    $this->categories = $categories;
  }

  /**
   * Display all categories
   *
   * @return View home
   */
  public function categories()
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
  public function category($categorySlug)
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
  public function album($albumSlug)
  {
    $photoset = Photoset::where('slug', $albumSlug)->first();
    $category = $this->categories->getPhotosCategory();

    return View::make('categories.subcategories.photoset')
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
  public function support($supportSlug)
  {
    $support  = Support::with('illustrations')->find($supportSlug);
    $category = $this->categories->getIllustrationsCategory();

    return View::make('categories.subcategories.support')
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
  public function story($storySlug)
  {
    $category = $this->categories->getStoriesCategory();
    $story = Story::find($storySlug);

    return View::make('categories.subcategories.story')
      ->with('category', $category)
      ->with('story', $story);
  }

}
