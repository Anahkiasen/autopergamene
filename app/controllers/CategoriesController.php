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
   * Display a Story
   *
   * @param string $storySlug The Story slug
   *
   * @return View story
   */
  public function getStory($storySlug)
  {
    $category = Category::find('les-fleurs-davril');
    $story = Story::find($storySlug);

    return View::make('story')
      ->with('category', $category)
      ->with('story', $story);
  }
}