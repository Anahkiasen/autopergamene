<?php

// Run photos seeds again
DB::table('photos')->delete();
include 'photos.php';

// Get all collections from my Flickr user
$sets = Flickering::photosetsGetList('31667913@N06');

return Arrays::each($sets->results()->photoset, function($photoset) {
  return [
    'id'         => $photoset['id'],
    'name'       => $photoset['title']['_content'],
    'slug'       => String::slugify($photoset['title']['_content']),
    'created_at' => $photoset['date_create'],
    'updated_at' => $photoset['date_update'],
  ];
});
