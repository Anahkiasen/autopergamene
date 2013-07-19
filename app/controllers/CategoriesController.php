<?php
use Autopergamene\Repositories\CategoriesRepository;

/**
 * Dispatches to various Category places
 */
class CategoriesController extends BaseController
{

  /**
   * The Category Repository
   *
   * @var CategoriesRepository
   */
  protected $categories;

  /**
   * Bind dependencies
   *
   * @param CategoriesRepository $categories
   */
  public function __construct(CategoriesRepository $categories)
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
   * Display a Support
   *
   * @param string $supportSlug The Support slug
   *
   * @return View support
   */
  public function support($supportSlug)
  {
    $support  = Autopergamene\Support::with('illustrations')->find($supportSlug);
    $category = $this->categories->getBySlug('illustration');

    return View::make('categories.subcategories.support')
      ->with('category', $category)
      ->with('support', $support);
  }

}
