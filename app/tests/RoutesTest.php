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
}