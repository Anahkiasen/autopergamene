<?php
use Autopergamene\Models\Service;

/**
 * Set the social networks
 */
class ServicesTableSeeder extends DatabaseSeeder
{
	public function run()
	{
		foreach ($this->getSocial() as $social) {
			list($name, $link) = $social;

			Service::create(array(
				'name' => $name,
				'icon' => Str::slug($name).'.svg',
				'link' => $link,
			));
		}
	}

	////////////////////////////////////////////////////////////////////
	/////////////////////////// CORE METHODS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the social networks's URLs
	 *
	 * @return array
	 */
	protected function getSocial()
	{
		return [
			['Mail', 'ehtnam6@gmail.com'],
			['Facebook', 'http://facebook.com/anahkiasen'],
			['Twitter', 'http://twitter.com/anahkiasen'],
			['Github', 'http://github.com/anahkiasen'],
			['Flickr', 'http://flickr.com/photos/anahkiasen'],
			['Last.fm', 'http://last.fm/user/anahkiasen'],
			['Steam', 'http://steamcommunity.com/id/anahkiasen'],
			['Wordpress', 'http://blogs.wefrag.com/anahkiasen'],
			['SoundCloud', 'http://soundcloud.com/anahkiasen'],
			['YouTube', 'http://youtube.com/user/Ehtnam6'],
		];
	}
}
