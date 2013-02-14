<?php
class ServicesSeeder extends BaseSeed
{
  public function getSeeds()
  {
    return Arrays::each($this->getSocial(), function($social) {
      list($name, $link) = $social;

      return [
        'name'       => $name,
        'icon'       => String::slugify($name).'.svg',
        'link'       => $link,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ];
    });
  }

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// CORE METHODS ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  protected function getSocial()
  {
    return [
      ['Mail'      , 'ehtnam6@gmail.com'],
      ['Facebook'  , 'http://www.facebook.com/anahkiasen'],
      ['Twitter'   , 'https://twitter.com/#!/anahkiasen'],
      ['Github'    , 'https://github.com/anahkiasen'],
      ['Flickr'    , 'http://www.flickr.com/photos/anahkiasen'],
      ['Last.fm'   , 'http://www.last.fm/user/anahkiasen'],
      ['Steam'     , 'http://steamcommunity.com/id/anahkiasen'],
      ['Wordpress' , 'http://blogs.wefrag.com/anahkiasen'],
      ['SoundCloud', 'http://soundcloud.com/anahkiasen'],
      ['YouTube'   , 'http://www.youtube.com/user/Ehtnam6'],
    ];
  }
}