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

  public function testHomepage()
  {
  	$this->assertIsPage('', 'Autopergamene');
  }

  /**
   * @dataProvider provideCategories
   */
  public function testCategories($categoryName)
  {
  	$url = 'category/'.String::slugify($categoryName);
  	$this->assertIsPage($url, $categoryName);
  }

	// Helpers ------------------------------------------------------- /

  /**
   * Check if a page is correctly loaded
   */
	private function assertIsPage($url, $title)
	{
    $crawler = $this->client->request('GET', '/'.$url);

    $this->assertTrue($this->client->getResponse()->isOk());
		$this->assertCount(1, $crawler->filter('title:contains("' .$title. '")'), "The request page $title couldn't be reacher");
	}
}