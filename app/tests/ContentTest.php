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

  /**
   * @dataProvider provideExternalHomeLinks
   */
  public function testExternalHomeCategoriesAreBlank($category)
  {
    $crawler = $this->getPage();
    /*$links = $crawler->filter('.categories figure a')->each(function($link) {
      return $link->attr('alt');
    });
    var_dump($links);*/
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