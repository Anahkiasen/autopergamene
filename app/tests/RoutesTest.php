<?php
use Underscore\Types\String;

class RoutesTest extends TestCase
{
  // Data providers ------------------------------------------------ /

  public function provideCategories()
  {
    return [
      ['Graceful Degradation'],
      ['Illustration'],
      ["Les Fleurs d'Avril"],
      ['Memorabilia'],
      ['The Winter Throat'],
      ['Today is Sunday'],
    ];
  }

  public function provideCategoriesWithArticles()
  {
    return [
      ['Graceful Degradation'],
      ['Memorabilia'],
    ];
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
    $url = 'category/'.String::slugify($categoryName);
    $this->assertIsPage($url, $categoryName);
  }

  /**
   * @dataProvider provideCategoriesWithArticles
   */
  public function testCanLoadRelatedArticles($categoryName)
  {
    $url = 'category/'.String::slugify($categoryName);
    $crawler = $this->getPage($url);

    $articles = sizeof($crawler->filter('.articles article'));
    $this->assertNotEquals(0, $articles, 'No articles found in this category');
  }
}