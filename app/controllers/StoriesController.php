<?php
use Autopergamene\Repositories\CategoriesRepository;
use Autopergamene\Story;

/**
 * Controller for the Stories
 */
class StoriesController extends BaseController
{
	/**
	 * The Categories Repository
	 *
	 * @var CategoriesRepository
	 */
	protected $categories;

	/**
	 * The Stories Repository
	 *
	 * @var Story
	 */
	protected $stories;

	/**
	 * Build a new StoriesController
	 *
	 * @param CategoriesRepository $categories
	 * @param Story                $stories
	 */
	public function __construct(CategoriesRepository $categories, Story $stories)
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
    	'story'    => $this->stories->findOrFail($slug),
    ));
  }
}