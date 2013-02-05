<?php
/**
 * Categories
 *
 * Dispatches to various Category places
 */
class CategoriesController extends BaseController
{
  /**
   * Displays a Category
   *
   * @param string $categorySlug The Category slug
   *
   * @return View categories/$slug
   */
  public function getCategory($categorySlug)
  {
    $category = Category::find($categorySlug);

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
    $category = Category::find('memorabilia');

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
    $category = Category::find('illustration');

    return View::make('support')
      ->with('category', $category)
      ->with('support', $support);
  }

  /**
   * Display a Novel
   *
   * @param string $storySlug The Novel slug
   *
   * @return View novel
   */
  public function getStory($storySlug)
  {
    $category = Category::find('les-fleurs-davril');
    $novel = Novel::find($storySlug);

    return View::make('novel')
      ->with('category', $category)
      ->with('novel', $novel);
  }
}