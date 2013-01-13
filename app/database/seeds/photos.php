<?php

// Get all collections from my Flickr user
$photos = array();
$sets = Flickering::photosetsGetList('31667913@N06');
$photosets = Arrays::each($sets->results()->photoset, function($photoset) { return $photoset['id']; });

foreach ($photosets as $photoset_id) {

  // Get all photos from this set
  $_photos = Flickering::photosetsGetPhotos($photoset_id);
  $_photos = $_photos->results()->photo;

  // Get all sets ids from there
  foreach($_photos as $key => $photo) {
    $name    = $photo['title'];
    $surname = preg_replace('/[0-9a-z]+ (- )?\(?([a-zA-Zàèé\' ]+)\)?/', '$2', $name);
    if (preg_match('/[0-9]{1,2}[a-z]{0,2}/', $surname)) $surname = '';

    $photos[$photo['id']] = array(
      'id'          => $photo['id'],
      'name'        => $name,
      'surname'     => $surname,
      'farm'        => 'http://farm' .$photo['farm']. '.staticflickr.com/' .$photo['server']. '/' .$photo['id']. '_'.$photo['secret'],
      'thumbnail'   => $photo['isprimary'],
      'photoset_id' => $photoset_id,
      'created_at'  => new DateTime,
      'updated_at'  => new DateTime,
    );
  }
}

$slice = array_chunk($photos, 100);
foreach($slice as $key => $photos) {
  if ($key == sizeof($slice) - 1) continue;
  var_dump(sizeof($photos));
  DB::table('photos')->insert($photos);
}

return $photos;