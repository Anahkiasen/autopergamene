<?php
ini_set('memory_limit', '64M');
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

  protected $externalCategories = array(
    'Le Soulèvement',
  );

  // Homepage ------------------------------------------------------ /

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

  public function testCategoriesAreLoaded()
  {
    $crawler = $this->getPage();
    $this->assertNthItemsExist($crawler, 8, '.categories h3');
  }

  public function testCategoriesAreLoadedInCorrectOrder()
  {
    $crawler = $this->getPage();
    $categories = $crawler->filter('.categories h3')->each(function($node) {
      return $node->nodeValue;
    });

    $categoriesOrder = array(
      "Memorabilia",
      "Graceful Degradation",
      "The Winter Throat",
      "Les Fleurs d'Avril",
      "Le Soulèvement",
      "Today is Sunday",
      "Illustration",
      "En averse d'encre",
    );

    $this->assertEquals($categoriesOrder, $categories);
  }

  public function testExternalLinksAreTargetBlank()
  {
    $crawler = $this->getPage();

    $categories = $crawler->filter('.categories a');
    foreach ($categories as $category) {
      $categoryName  = $category->childNodes->item(2)->firstChild->nodeValue;
      $linkBlank     = $category->hasAttribute('target');
      $shouldBeBlank = in_array($categoryName, $this->externalCategories);

      $this->assertEquals($shouldBeBlank, $linkBlank);
    }

  }

  // Categories ---------------------------------------------------- /

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

    $this->assertNthItemsExist($crawler, 7, '.repository');
  }

  public function testCanLoadStories()
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

  public function testStoriesAreRenderedCorrectly()
  {
    $crawler = $this->getPage('category/les-fleurs-davril/story/a-lombre-dun-chene');

    $this->assertTagContains($crawler, 'h3', '0');
  }
}