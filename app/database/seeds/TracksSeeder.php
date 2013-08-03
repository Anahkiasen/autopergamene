<?php
use Autopergamene\Track;

class TracksSeeder extends BaseSeed
{
	public function run()
	{
		return Arrays::each($this->getTracks(), function($track) {
			$track->touch();
		});
	}

	////////////////////////////////////////////////////////////////////
	/////////////////////////// CORE METHODS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the Tracks to seed
	 *
	 * @return array
	 */
	protected function getTracks()
	{
		$sets = 'https://api.soundcloud.com/users/anahkiasen/playlists.json?consumer_key=2dfa4a9133c293421b743e7414d8b1f3';
		$sets = Cache::remember($sets, 3600, function() use ($sets) {
			return json_decode(File::getRemote($sets), true);
		});

		foreach ($sets as $set) {
			foreach ($set['tracks'] as $track) {
				$tracks[] = Track::create(array(
					'name'       => $track['title'],
					'soundcloud' => $track['id'],
					'movements'  => $track['description'],
					'set'        => $set['title'],
					'plays'      => (int) ($track['playback_count'] + $track['download_count'])
				));
			}
		}

		return $tracks;
	}
}
