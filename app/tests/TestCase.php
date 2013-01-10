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
   * Check if a particular number of items exist in a page
   */
  protected function assertNthItemsExist($crawler, $number, $select, $message = null)
  {
    $items = $crawler->filter($select);
    if (!$message) $message = sizeof($items). " instead of $number of `$select` were found in the page";

    $this->assertCount($number, $items, $message);
  }

  /**
   * Check if some items exist in a page
   */
  protected function assertItemsExist($crawler, $select, $message = null)
  {
    if (!$message) $message = "The items `$select` were no found in the page";

    $this->assertNotCount(0, $crawler->filter($select), $message);
  }

  /**
   * Get the Crawler for a page
   */
  protected function getPage($url = null)
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

    $this->assertTagContains($crawler, 'title', $title);
  }

  /**
   * Check if a tag contains something
   */
  protected function assertTagContains($crawler, $tag, $content)
  {
    $this->assertCount(1, $crawler->filter($tag.':contains("' .$content. '")'), "The tag $tag doesn't contain $content");
  }
}