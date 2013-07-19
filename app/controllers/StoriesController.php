<?php
class StoriesController extends BaseController
{
	/**
	 * Build a new StoriesController
	 *
	 * @param CategoriesRepository $categories
	 * @param StoriesRepository    $stories
	 */
	public function __construct(CategoriesRepository $categories, StoriesRepository $stories)
	{
		$this->category = $categories->getBySlug('les-fleurs-davril');
		$this->stories  = $stories;
	}

	/**
	 * Display all stories
	 *
	 * @return View categories.les-fleurs-davril
	 */
	public function stories()
	{
		return View::make('categories.les-fleurs-davril', array(
			'category' => $this->category,
		));
	}

  /**
   * Display a Story
   *
   * @param string $slug The Story slug
   *
   * @return View story
   */
  public function story($slug)
  {
    return View::make('categories.subcategories.story', array(
    	'category' => $this->category,
    	'story'    => $this->stories->getBySlug($slug),
    ));
  }
}