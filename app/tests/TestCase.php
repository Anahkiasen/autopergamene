<?php
class TestCase extends Illuminate\Foundation\Testing\TestCase
{
  /**
   * Creates the application.
   *
   * @return Symfony\Component\HttpKernel\HttpKernelInterface
   */
  public function createApplication()
  {
  	$unitTesting = true;
    $testEnvironment = 'testing';

  	return require __DIR__.'/../../start.php';
  }

  ////////////////////////////////////////////////////////////////////
  //////////////////////////// HELPERS ///////////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get the Crawler for a page
   *
   * @param string $url The page url
   *
   * @return Crawler
   */
  protected function getPage($url)
  {
    $crawler = $this->client->request('GET', '/'.$url);
    $this->assertTrue($this->client->getResponse()->isOk());

    return $crawler;
  }

  /**
   * Check if a page is correctly loaded
   */
  protected function assertIsPage($url, $title)
  {
    $crawler = $this->getPage($url);

    $this->assertCount(1, $crawler->filter('title:contains("' .$title. '")'), "The request page $title couldn't be reacher");
  }
}