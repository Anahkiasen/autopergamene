<?php
namespace Autopergamene;

use Arrounded\Assets\AssetsHandler;
use Illuminate\Support\ServiceProvider;

/**
 * Register the AutopergameneServiceProvider classes
 */
class AutopergameneServiceProvider extends ServiceProvider
{
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('assets', function ($app) {
			return new AssetsHandler($app['config']['assets']);
		});

		$this->app->view->composers(array(
			'Autopergamene\Composers\PagesComposer@composeHome'         => '_partials.about',
			'Autopergamene\Composers\LayoutComposer@composerFooter'     => '_layouts.partials.footer',
			'Autopergamene\Composers\PagesComposer@composeTracks'       => 'categories.the-winter-throat',
			'Autopergamene\Composers\PagesComposer@composeRepositories' => 'categories.graceful-degradation',
			'Autopergamene\Composers\PagesComposer@composeTableaux'     => 'categories.today-is-sunday',
		));
	}
}
