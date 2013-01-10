<?php
use Underscore\Types\String;
use Illuminate\Database\Query\Builder;

class RoutesTest extends Cerberus\Scrutiny
{
  // Data providers ------------------------------------------------ /

  public function provideCategories()
  {
    return $this->app['db']->from('categories')->get();
  }

  public function provideArticles()
  {
    $this->app['db'] = $this->app['db']->connection($connection);
    return $this->app['db']->from('articles')->get();
  }

  // Tests --------------------------------------------------------- /

  public function testcanDisplayHomepage()
  {
    $this->assertIsPage('', 'Autopergamene');
  }


  public function testCanDisplayArticles()
  {
    var_dump($this->app['db']->from('categories')->get());
    return true;
    $url = 'category/graceful-degradation/articles/'.$article->id;
    $this->assertIsPage($url, $article->name);
  }
}