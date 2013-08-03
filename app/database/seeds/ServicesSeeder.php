<?php

class ServicesSeeder extends BaseSeed
{
	public function getSeeds()
	{
		return Arrays::each($this->getSocial(), function($social) {
			list($name, $link) = $social;

			return [
				'name'       => $name,
				'icon'       => Str::slug($name).'.svg',
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
			['Facebook'  , 'http://facebook.com/anahkiasen'],
			['Twitter'   , 'http://twitter.com/anahkiasen'],
			['Github'    , 'http://github.com/anahkiasen'],
			['Flickr'    , 'http://flickr.com/photos/anahkiasen'],
			['Last.fm'   , 'http://last.fm/user/anahkiasen'],
			['Steam'     , 'http://steamcommunity.com/id/anahkiasen'],
			['Wordpress' , 'http://blogs.wefrag.com/anahkiasen'],
			['SoundCloud', 'http://soundcloud.com/anahkiasen'],
			['YouTube'   , 'http://youtube.com/user/Ehtnam6'],
		];
	}
}
