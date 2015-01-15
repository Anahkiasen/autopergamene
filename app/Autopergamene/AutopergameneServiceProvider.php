<?php
namespace Autopergamene;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Symfony\Component\Finder\Finder;

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
        $this->registerViewComposers();
        $this->registerRouteBindings();
    }

    /**
     * Register the bindings for repositories
     */
    protected function registerRouteBindings()
    {
        // List all repositories
        $repositories = app_path('Autopergamene/Repositories');
        $finder       = new Finder();
        $files        = $finder->in($repositories)->files();

        /** @type \SplFileObject $file */
        foreach ($files as $file) {
            // Create instance of repository
            $repository = sprintf('Autopergamene\Repositories\%s', $file->getBasename('.php'));
            $repository = $this->app->make($repository);

            // Compute bindings
            $model    = $repository->getModel();
            $model    = class_basename($model);
            $bindings = array_map('strtolower', array(
                $model,
                Str::plural($model),
            ));

            // Register with router
            foreach ($bindings as $binding) {
                $this->app['polyglot.router']->bind($binding, get_class($repository).'@find');
            }
        }
    }

    /**
     * Register the various view composers
     */
    protected function registerViewComposers()
    {
        $namespace = 'Autopergamene\Composers\\';

        $this->app->view->composers(array(
            $namespace.'PagesComposer@composeHome'         => '_partials.about',
            $namespace.'LayoutComposer@composerFooter'     => '_layouts.partials.footer',
            $namespace.'PagesComposer@composeTracks'       => 'categories.the-winter-throat',
            $namespace.'PagesComposer@composeRepositories' => 'categories.graceful-degradation',
            $namespace.'PagesComposer@composeTableaux'     => 'categories.today-is-sunday',
        ));
    }
}
