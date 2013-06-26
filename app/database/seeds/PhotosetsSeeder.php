<?php

class PhotosetsSeeder extends BaseSeed
{
  public function getSeeds()
  {
    $photosets = Flickering::photosetsGetList('31667913@N06')->getResults('photoset');

    return Arrays::each($photosets, function($photoset) {
      return [
        'id'         => $photoset['id'],
        'name'       => $photoset['title']['_content'],
        'slug'       => String::slugify($photoset['title']['_content']),
        'created_at' => $photoset['date_create'],
        'updated_at' => $photoset['date_update'],
      ];
    });
  }
}
