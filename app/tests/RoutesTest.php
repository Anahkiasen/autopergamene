<?php
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RoutesTest extends TestCase
{

	public function testCanDisplayRoutes()
	{
		$routes = array(
			'/',
		);

		foreach (Category::all() as $category) {
			if ($category->isExternal()) continue;
			$routes[] = $category->link;
		}

		foreach (Article::all() as $article) {
			$routes[] = $article->link;
		}

		foreach (Story::all() as $story) {
			$routes[] = URL::action('CategoriesController@story', $story->id);
		}

		foreach (Photoset::all() as $photoset) {
			$routes[] = URL::action('CategoriesController@album', $photoset->slug);
		}

		foreach (Support::all() as $support) {
			$routes[] = URL::action('CategoriesController@support', $support->id);
		}

		foreach ($routes as $route) {
			try {
				print 'Testing route '.$route.PHP_EOL;

				$response = $this->call('GET', $route);
				$this->assertResponseOk();
			} catch (NotFoundHttpException $exception) {
				$this->fail('Route "' .$route. '" was not found');
			}
		}
	}

}