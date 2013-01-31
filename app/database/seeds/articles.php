<?php

$_articles = file_get_contents('http://blogs.wefrag.com/Anahkiasen/feed/');
$_articles = str_replace('content:encoded', 'content', $_articles);
$_articles = simplexml_load_string($_articles)->channel->item;

foreach($_articles as $article) {

  // Category
  $category = (array) $article->category;
  if (!$category) continue;

  $category_id = null;
  $category = $category[0]->__toString();
  if ($category == 'Webdesign') $category_id = 'graceful-degradation';
  elseif ($category == 'Photographies') $category_id = 'memorabilia';
  elseif ($category == 'Musique') $category_id = 'the-winter-throat';

  if (!$category_id) continue;

  // Date
  $date = $article->pubDate;
  $date = new DateTime($date);

  // Article
  $articles[] = array(
    'category_id' => $category_id,
    'content'     => trim($article->content->__toString()),
    'summary'     => trim($article->description->__toString()),
    'name'        => $article->title->__toString(),
    'created_at'  => $date,
    'updated_at'  => $date,
  );
}

return $articles;