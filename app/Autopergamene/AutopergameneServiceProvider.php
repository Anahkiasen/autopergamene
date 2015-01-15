<?php
namespace Autopergamene;

use Arrounded\Abstracts\AbstractServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

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
    }
}
