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