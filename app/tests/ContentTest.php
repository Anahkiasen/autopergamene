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

    $this->assertItemsExist($crawler, '.articles article', 'No articles found in this category');
  }

  public function testCanLoadRepositories()
  {
    $crawler = $this->getPage('category/graceful-degradation');

    $this->assertNthItemsExist($crawler, 4, '.repository');
  }
}