<?php
use Autopergamene\Article;

class ArticlesSeeder extends Seeder
{
	/**
	 * Seed articles
	 */
	public function run()
	{
		foreach ($this->getArticlesFeed() as $article) {

			// Category
			$categories  = (array) $article->category;
			$category_id = $this->getCategoryOf($categories);
			if (!$category_id) {
				continue;
			}

			// Tags
			$tags = array();
			array_shift($categories);
			foreach ($categories as $tag) {
				$tags[] = (string) $tag;
			}

			// Strip some stuff in the titles
			$title = $article->title->__toString();
			$title = $this->removeHashtagsFromTitle($title);

			// Date
			$date = $article->pubDate;
			$date = new DateTime($date);

			// Article
			Article::create([
				'category_id' => $category_id,
				'slug'        => Str::slug($title),
				'content'     => trim($article->content->__toString()),
				'summary'     => trim($article->description->__toString()),
				'tags'        => $tags,
				'name'        => $title,
				'created_at'  => $date,
				'updated_at'  => $date,
			]);
		}
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
		if (!$category) {
			return false;
		}

		$category   = $category[0]->__toString();
		$categories = array(
			'Webdesign'     => 'graceful-degradation',
			'Photographies' => 'memorabilia',
			'Musique'       => 'the-winter-throat',
		);

		return array_get($categories, $category);
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
			$title = str_replace("[$hashtag]", null, $title);
		}

		return $title;
	}
}
