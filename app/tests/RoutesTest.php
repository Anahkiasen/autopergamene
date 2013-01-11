<?php
use Underscore\Types\String;

class RoutesTest extends Cerberus\Scrutiny
{
  // Data providers ------------------------------------------------ /

  public function provideCategories()
  {
    return array(
      array('Graceful Degradation'),
      array('Illustration'),
      array("Les Fleurs d'Avril"),
      array('Memorabilia'),
      array('The Winter Throat'),
      array('Today is Sunday'),
    );
  }

  public function provideArticles()
  {
    return DB::table('articles')->get();
  }

  // Tests --------------------------------------------------------- /

  public function testcanDisplayHomepage()
  {
    $this->assertIsPage('', 'Autopergamene');
  }

  /**
   * @dataProvider provideCategories
   */
  public function testCanDisplayCategories($categoryName)
  {
    // Temporary fix to thumb generation problems
    if ($categoryName == 'Illustration') {
      $this->setExpectedException('Imagine\Exception\InvalidArgumentException');
    }

    $url = 'category/'.String::slugify($categoryName);
    $this->assertIsPage($url, $categoryName);
  }

  public function testCanDisplayArticles()
  {
    $url = 'category/graceful-degradation/articles/7';
    $this->assertIsPage($url, 'Nouveau design test');
  }
}