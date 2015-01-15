<?php
namespace Autopergamene;

use Arrounded\Abstracts\AbstractServiceProvider;
use League\Glide\Factories\Server;
use League\Glide\Factories\UrlBuilder;

/**
 * Register the AutopergameneServiceProvider classes
 */
class AutopergameneServiceProvider extends AbstractServiceProvider
{
    /**
     * The application's namespace
     *
     * @type string
     */
    protected $namespace = 'Autopergamene';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerViewComposers(array(
            'PagesComposer@composeHome'         => '_partials.about',
            'LayoutComposer@composerFooter'     => '_layouts.partials.footer',
            'PagesComposer@composeTracks'       => 'categories.the-winter-throat',
            'PagesComposer@composeRepositories' => 'categories.graceful-degradation',
            'PagesComposer@composeTableaux'     => 'categories.today-is-sunday',
        ));
    }

    public function boot()
    {
        $this->app['arrounded']->setNamespace('Autopergamene');
        $this->app['arrounded']->setModelsNamespace('Autopergamene\Entities');

        $this->bootRouteBindings();

        $this->app->singleton('glide', function () {
            return Server::create(array(
                'source'   => public_path('app'),
                'cache'    => public_path('cache'),
            ));
        });

        $this->app->singleton('glide.url', function ($app) {
           return UrlBuilder::create($app['config']['app.url']);
        });
    }
}
