<?php
use Autopergamene\Photography\Photoset;

class PhotosetsSeeder extends BaseSeed
{
  public function run()
  {
    $photosets = Flickering::photosetsGetList('31667913@N06')->getResults('photoset');

    foreach ($photosets as $photoset) {
      Photoset::create([
        'id'         => $photoset['id'],
        'name'       => $photoset['title']['_content'],
        'slug'       => Str::slug($photoset['title']['_content']),
        'created_at' => $photoset['date_create'],
        'updated_at' => $photoset['date_update'],
      ]);
    }
  }
}
