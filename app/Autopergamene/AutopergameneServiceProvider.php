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
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		// ...
	}
}
