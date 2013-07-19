<?php
use Autopergamene\Article;
use Autopergamene\Category;
use Autopergamene\Photography\Photoset;
use Autopergamene\Story;
use Autopergamene\Support;

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

		foreach (Category::all() as $category) {
			if ($category->isExternal()) continue;
			$this->routes[] = $category->link;
		}

		foreach (Article::all() as $article) {
			$this->routes[] = $article->link;
		}

		foreach (Story::all() as $story) {
			$this->routes[] = URL::action('CategoriesController@story', $story->id);
		}

		foreach (Photoset::all() as $photoset) {
			$this->routes[] = URL::action('PhotographiesController@photoset', $photoset->slug);
		}

		foreach (Support::all() as $support) {
			$this->routes[] = URL::action('CategoriesController@support', $support->id);
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
