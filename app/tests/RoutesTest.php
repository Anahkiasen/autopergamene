<?php
use Underscore\Types\String;

class RoutesTest extends TestCase
{
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

  public function testHomepage()
  {
    $crawler = $this->client->request('GET', '/');

    $this->assertTrue($this->client->getResponse()->isOk());
    $this->assertCount(1, $crawler->filter('h1:contains("Autopergamene")'));
  }

  /**
   * @dataProvider provideCategories
   */
  public function testCategories($categoryName)
  {
    $crawler = $this->client->request('GET', '/category/'.String::slugify($categoryName));

    $this->assertTrue($this->client->getResponse()->isOk());
    $this->assertCount(1, $crawler->filter('title:contains("' .$categoryName. '")'));
  }
}