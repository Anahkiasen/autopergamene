<?php
namespace Autopergamene\Composers;

use Autopergamene\Models\Tableau;
use Autopergamene\Models\Track;
use Autopergamene\Repositories\RepositoriesRepository;
use Autopergamene\Repositories\ServicesRepository;
use Carbon\Carbon;
use Illuminate\View\View;

class PagesComposer
{
	/**
	 * @type ServicesRepository
	 */
	private $services;

	/**
	 * @type RepositoriesRepository
	 */
	private $repositories;

	/**
	 * @param ServicesRepository $services
	 */
	public function __construct(ServicesRepository $services, RepositoriesRepository $repositories)
	{
		$this->services     = $services;
		$this->repositories = $repositories;
	}

	/**
	 * Composer the homepage
	 *
	 * @param View $view
	 */
	public function composeHome(View $view)
	{
		$view->services = $this->services->all();

		// Get current time and timezone
		$today = Carbon::now('Europe/Paris');

		// Calculating dates
		$view->age  = Carbon::createFromDate(1990, 3, 2)->diffInYears($today);
		$view->work = ceil(Carbon::createFromDate(2009, 10, 1)->diffInMonths($today) / 12);
	}

	/**
	 * @param View $view
	 */
	public function composeTracks(View $view)
	{
		$view->tracks = Track::orderBy('plays', 'desc')->get();
	}

	/**
	 * @param View $view
	 */
	public function composeRepositories(View $view)
	{
		$view->repositories = $this->repositories->getOrderedRepositories();
	}

	/**
	 * @param View $view
	 */
	public function composeTableaux(View $view)
	{
		$view->tableaux = Tableau::latest()->get();
	}
}
