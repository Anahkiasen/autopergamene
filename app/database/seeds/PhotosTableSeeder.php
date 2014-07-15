<?php
use Autopergamene\Photography\Photo;
use Autopergamene\Photography\Photoset;

/**
 * Seed the photos
 */
class PhotosTableSeeder extends DatabaseSeeder
{
	public function run()
	{
		foreach ($this->getPhotosFromPhotosets() as $photosetId => $photoset) {
			foreach ($photoset as $photo) {
				$name    = $photo['title'];
				$surname = $this->getSurnameFromTitle($name);

				Photo::create(array(
					'id'          => $photo['id'],
					'name'        => $name,
					'surname'     => $surname,
					'farm'        => 'http://farm'.$photo['farm'].'.staticflickr.com/'.$photo['server'].'/'.$photo['id'].'_'.$photo['secret'],
					'thumbnail'   => $photo['isprimary'],
					'photoset_id' => $photosetId,
				));
			}
		}
	}

	////////////////////////////////////////////////////////////////////
	/////////////////////////// CORE METHODS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the surname from the various titles patterns
	 *
	 * @param string $title The photo title
	 *
	 * @return string Its facultative surname
	 */
	protected function getSurnameFromTitle($title)
	{
		$surname = preg_replace('/[0-9a-z]+ (- )?\(?([a-zA-Zàèé\' ]+)\)?/', '$2', $title);
		if (preg_match('/[0-9]{1,2}[a-z]{0,2}/', $surname)) {
			$surname = '';
		}

		return $surname;
	}

	/**
	 * Get all my photosets' IDs
	 *
	 * @return array
	 */
	protected function getPhotosFromPhotosets()
	{
		foreach (Photoset::all() as $photoset) {
			$photosets[$photoset->id] = Flickering::photosetsGetPhotos($photoset->id)->getResults('photo');
		}

		return $photosets;
	}
}
