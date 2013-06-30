<?php
use Underscore\Parse;

class ArticlesSeeder extends BaseSeed
{
  /**
   * Seed articles
   */
  public function getSeeds()
  {
    foreach ($this->getArticlesFeed() as $article) {

      // Category
      $categories = (array) $article->category;
      $category_id = $this->getCategoryOf($categories);
      if (!$category_id) continue;

      // Tags
      $tags = Arrays::removeFirst($categories);
      $tags = Arrays::each($tags, function($tag) {
        return (string) $tag;
      });
      $tags = Parse::toJSON($tags);

      // Strip some stuff in the titles
      $title = $article->title->__toString();
      $title = $this->removeHashtagsFromTitle($title);

      // Date
      $date = $article->pubDate;
      $date = new DateTime($date);

      // Article
      $articles[] = array(
        'category_id' => $category_id,
        'slug'        => Str::slug($title),
        'content'     => trim($article->content->__toString()),
        'summary'     => trim($article->description->__toString()),
        'tags'        => $tags,
        'name'        => $title,
        'created_at'  => $date,
        'updated_at'  => $date,
      );
    }

    return $articles;
  }

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// CORE METHODS ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get feed from Wordpress
   *
   * @return array
   */
  protected function getArticlesFeed()
  {
    $feed = file_get_contents('http://blogs.wefrag.com/Anahkiasen/feed/');
    $feed = str_replace('content:encoded', 'content', $feed);
    $feed = simplexml_load_string($feed)->channel->item;

    return $feed;
  }

  /**
   * Get the category of the article
   *
   * @param array $category
   *
   * @return string
   */
  protected function getCategoryOf($category)
  {
    if (!$category) return false;

    $category = $category[0]->__toString();
    $categories = array(
      'Webdesign'     => 'graceful-degradation',
      'Photographies' => 'memorabilia',
      'Musique'       => 'the-winter-throat',
    );

    return Arrays::get($categories, $category);
  }

  /**
   * Return clean title
   *
   * @param string $title The title
   *
   * @return string Cleaned title
   */
  protected function removeHashtagsFromTitle($title)
  {
    $hashtags = array('Musique', 'Photos', 'Compo');
    foreach ($hashtags as $hashtag) {
      $title = String::remove($title, "[$hashtag]");
    }

    return $title;
  }
}
