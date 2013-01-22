<?php

// Raw data
$_social = [
  ['Mail'      , 'ehtnam6@gmail.com'],
  ['Facebook'  , 'http://www.facebook.com/Anahkiasen'],
  ['Github'    , 'https://github.com/Anahkiasen'],
  ['Last.fm'   , 'http://www.last.fm/user/Anahkiasen'],
  ['Steam'     , 'http://steamcommunity.com/id/Anahkiasen/'],
  ['Wordpress' , 'http://blogs.wefrag.com/Anahkiasen/'],
  ['YouTube'   , 'http://www.youtube.com/user/Ehtnam6'],
  ['SoundCloud', 'http://soundcloud.com/anahkiasen'],
  ['Flickr'    , 'http://www.flickr.com/photos/anahkiasen'],
  ['Twitter'   , 'https://twitter.com/#!/Anahkiasen'],
];

// Format data
return Arrays::each($_social, function($social) {
  list($name, $link) = $social;

  return [
    'name'       => $name,
    'icon'       => String::slugify($name).'.svg',
    'link'       => $link,
    'created_at' => new DateTime,
    'updated_at' => new DateTime,
    ];
  }
});
