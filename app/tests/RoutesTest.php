<?php
use Autopergamene\Article;
use Autopergamene\Category;
use Autopergamene\Photography\Photoset;
use Autopergamene\Story;
use Autopergamene\Illustration\Support;

class RoutesTest extends TestCase
{
	/**
	 * The routes to test
	 *
	 * @var array
	 */
	protected $routes = array(
		'/',
	);

	/**
	 * The routes that failed
	 *
	 * @var array
	 */
	protected $failed = array();

	public function testCanDisplayRoutes()
	{
		foreach (Route::getRoutes() as $route) {
			$uri = $route->getPath();

			// Skip some routes
			if (Str::contains($uri, ['_profiler'])) {
				continue;
			}

			// Replace model with their IDs
			preg_match('/\{([^}]+)\}/', $uri, $pattern);
			$model = Str::studly(array_get($pattern, 1));
			if ($model == 'Photoset') $model = 'Photography\Photoset';
			if ($model == 'Support')  $model = 'Illustration\Support';
			$model = 'Autopergamene\\'.$model;

			if (class_exists($model)) {
				foreach ($model::all() as $model) {
					if ($model instanceof Category and $model->isExternal()) {
						continue;
					}

					$modelRoute = str_replace('{'.$pattern[1].'}', $model->slug, $uri);
					$this->routes[] = URL::to($modelRoute);
				}
				continue;
			}

			$this->routes[] = URL::to($uri);
		}

		$this->checkRoutes();
	}

	/**
	 * Test the routes
	 *
	 * @return void
	 */
	protected function checkRoutes()
	{
		foreach ($this->routes as $route) {
			$shorthand = str_replace(Request::root(), null, $route);

			try {
				$this->comment('Testing route '.$shorthand);
				$this->call('GET', $route);
				$this->assertResponseOk();
			} catch (Exception $exception) {
				$this->failedRoute($shorthand, $exception->getMessage());
			}
		}

		// Print summary
		$this->line(PHP_EOL.str_repeat('-', 75));
		$this->success(sizeof($this->routes). ' route(s) were tested');
		if (!empty($this->failed)) {
			$this->info(sizeof($this->failed). ' problem(s) were encountered :');
			foreach ($this->failed as $route => $message) {
				$this->error($route.str_repeat(' ', 150 - strlen($route)).$message);
			}

			$this->fail();
		}
	}

	/**
	 * Fail a route
	 *
	 * @param  string $route
	 * @param  string $message
	 *
	 * @return void
	 */
	protected function failedRoute($route, $message)
	{
		$this->failed[$route] = sprintf($message, $route);
	}
}
