<?php
use Underscore\Types\String;

class ContentTest extends TestCase
{
  // Data providers ------------------------------------------------ /

  public function provideCategoriesWithArticles()
  {
    return [
      ['Graceful Degradation'],
      ['Memorabilia'],
    ];
  }

  // Tests --------------------------------------------------------- /

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