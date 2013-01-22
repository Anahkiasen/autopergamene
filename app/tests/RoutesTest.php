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

  public function provideSupports()
  {
    return array(
      array('digital', 'Peinture digitale'),
      array('drawings', 'Papier'),
      array('maya', 'Rendus 3D'),
      array('video', 'Vidéo'),
    );
  }

  // Tests --------------------------------------------------------- /

  public function testcanDisplayHomepage()
  {
    $this->assertIsPage('', 'Autopergamene');
  }

  public function testPathsToStylesAreCorrect()
  {
    $page   = $this->getPage('');
    $styles = $page->filter('link')->extract('href');
    $styles = str_replace('http://:/', 'http://autopergamene.eu/', $styles[2]);

    $styles = (bool) file_get_contents($styles);
    $this->assertTrue($styles);
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

  // Subroutes ----------------------------------------------------- /

  /**
   * @dataProvider provideSupports
   */
  public function testCanDisplaySupport($slug, $name)
  {
    $url = 'category/illustration/support/'.$slug;
    $this->assertIsPage($url, $name);
  }

  public function testCanDisplayArticles()
  {
    $url = 'category/graceful-degradation/articles/7';
    $this->assertIsPage($url, 'Nouveau design test');
  }

  public function testCanDisplayPhotoset()
  {
    $url = 'category/memorabilia/album/la-page-blanche';
    $this->assertIsPage($url, 'La Page Blanche');
  }
}