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