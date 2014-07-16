<?php
namespace Autopergamene\Controllers;

use Autopergamene\Models\Story;
use Autopergamene\Repositories\CategoriesRepository;
use Autopergamene\Repositories\StoriesRepository;
use Controller;
use View;

/**
 * Controller for the Stories
 */
class StoriesController extends Controller
{
	/**
	 * The Category
	 *
	 * @type Category
	 */
	protected $category;

	/**
	 * The Stories Repository
	 *
	 * @type StoriesRepository
	 */
	protected $stories;

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
	public function index()
	{
		return View::make('categories.stories', array(
			'category' => $this->category,
			'stories'  => $this->stories->getLatest(),
		));
	}

	/**
	 * Display a Story
	 *
	 * @param Story $story
	 *
	 * @return View story
	 */
	public function show(Story $story)
	{
		return View::make('categories.subcategories.story', array(
			'category' => $this->category,
			'story'    => $story,
		));
	}
}
