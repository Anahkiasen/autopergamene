<?php
namespace Autopergamene\Composers;

use Autopergamene\Repositories\ServicesRepository;
use Illuminate\View\View;

class LayoutComposer
{
	/**
	 * @type ServicesRepository
	 */
	private $services;

	/**
	 * @param ServicesRepository $services
	 */
	public function __construct(ServicesRepository $services)
	{
		$this->services = $services;
	}

	/**
	 * Composer the header, footer, etc.
	 *
	 * @param View $view
	 */
	public function composerFooter(View $view)
	{
		$view->services = $this->services->getFooterServices();
	}
}
