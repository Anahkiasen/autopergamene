<?php
use Underscore\Types\String;

class ContentTest extends Cerberus\Scrutiny
{
  // Data providers ------------------------------------------------ /

  public function provideCategoriesWithArticles()
  {
    return array(
      array('Graceful Degradation'),
      array('Memorabilia'),
    );
  }

  public function provideExternalHomeLinks()
  {
    return array(
      array('Le Soulèvement'),
      array('Le blog'),
    );
  }

  // Tests --------------------------------------------------------- /

  public function testFooterIsProperlyLoaded()
  {
    $crawler = $this->getPage();

    $this->assertItemsExist($crawler, 'footer');
  }

  public function testSocialNetworksAreLoadedAndExternal()
  {
    $crawler = $this->getPage();

    // Check number of social networks
    $this->assertNthItemsExist($crawler, 10, '.social li');

    // Check if there are all external
    $targets = $crawler->filter('.social a')->extract('target');
    $this->assertContains('_blank', Arrays::unique($targets));
  }

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

    $this->assertNthItemsExist($crawler, 6, '.repository');
  }

  public function testCanLoadNovels()
  {
    $crawler = $this->getPage('category/les-fleurs-davril');

    $this->assertNthItemsExist($crawler, 8, '.novel-summary');
  }

  public function testCanLoadTableaux()
  {
    $crawler = $this->getPage('category/today-is-sunday');

    $this->assertNthItemsExist($crawler, 39, '.tableau img');
  }

  public function testCanLoadPhotosets()
  {
    $crawler = $this->getPage('category/memorabilia');

    $this->assertNthItemsExist($crawler, 32, '.collection img');
  }

  public function testNovelsAreRenderedCorrectly()
  {
    $crawler = $this->getPage('category/les-fleurs-davril/a-lombre-dun-chene');

    $this->assertTagContains($crawler, 'h3', '0');
  }
}