<?php

use Underscore\Parse;
use Underscore\Types\String;

$_articles = file_get_contents('http://blogs.wefrag.com/Anahkiasen/feed/');
$_articles = str_replace('content:encoded', 'content', $_articles);
$_articles = simplexml_load_string($_articles)->channel->item;

foreach($_articles as $article) {

  // Category
  $category = (array) $article->category;
  if (!$category) continue;

  $category_id = null;
  $mainCategory = $category[0]->__toString();
  if ($mainCategory == 'Webdesign') $category_id = 'graceful-degradation';
  elseif ($mainCategory == 'Photographies') $category_id = 'memorabilia';
  elseif ($mainCategory == 'Musique') $category_id = 'the-winter-throat';

  if (!$category_id) continue;

  // Categories
  $tags = Arrays::from($category)->removeFirst()->each(function($category) {
    return (string) $category;
  })->toJSON();

  // Strip some stuff in the titles
  $title = $article->title->__toString();
  $title = str_replace('[Musique] ', null, $title);
  $title = str_replace('[Photos] ', null, $title);
  $title = str_replace('[Compo] ', null, $title);

  // Date
  $date = $article->pubDate;
  $date = new DateTime($date);

  // Article
  $articles[] = array(
    'category_id' => $category_id,
    'slug'        => String::slug($title),
    'content'     => trim($article->content->__toString()),
    'summary'     => trim($article->description->__toString()),
    'tags'        => $tags,
    'name'        => $title,
    'created_at'  => $date,
    'updated_at'  => $date,
  );
}

return $articles;