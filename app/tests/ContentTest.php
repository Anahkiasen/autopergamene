<?php
use Underscore\Types\String;

class ContentTest extends TestCase
{
  // Data providers ------------------------------------------------ /

  public function provideCategoriesWithArticles()
  {
    return array(
      array('Graceful Degradation'),
      array('Memorabilia'),
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
    $targets = $crawler->filter('.social a')->extract(array('_text', 'target'));
    $targets = Arrays::from($targets)->pluck(1)->unique();
    $this->assertContains('_blank', $targets->obtain());
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

    $this->assertNthItemsExist($crawler, 4, '.repository');
  }
}