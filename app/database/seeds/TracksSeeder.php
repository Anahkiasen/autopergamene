<?php
use Autopergamene\Track;

class TracksSeeder extends Seeder
{
	public function run()
	{
		foreach ($this->getSets() as $set) {
			foreach ($set['tracks'] as $track) {

				// Create movements
				if (!$track['description']) {
					$movements = array();
				} else {
					$movements = explode(PHP_EOL, $track['description']);
					foreach ($movements as $key => $movement) {
						list($time, $name) = explode(' : ', $movement);
						$movements[$key] = compact('time', 'name');
					}
				}

				Track::create(array(
					'name'       => $track['title'],
					'soundcloud' => $track['id'],
					'movements'  => $movements,
					'set'        => $set['title'],
					'plays'      => (int) ($track['playback_count'] + $track['download_count'])
				));
			}
		}
	}

	////////////////////////////////////////////////////////////////////
	/////////////////////////// CORE METHODS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the Tracks to seed
	 *
	 * @return array
	 */
	protected function getSets()
	{
		$sets = 'https://api.soundcloud.com/users/anahkiasen/playlists.json?consumer_key=2dfa4a9133c293421b743e7414d8b1f3';
		$sets = Cache::remember($sets, 3600, function() use ($sets) {
			return json_decode(File::getRemote($sets), true);
		});

		return $sets;
	}
}
