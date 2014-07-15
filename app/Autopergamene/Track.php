<?php
namespace Autopergamene;

class Track extends BaseModel
{
	/**
	 * The color of the Soundcloud widget
	 *
	 * @var string
	 */
	protected $color = 'ea2c46';

	////////////////////////////////////////////////////////////////////
	///////////////////////////// ATTRIBUTES ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Return the URL to the Soundcloud API
	 */
	public function getSoundcloudAttribute()
	{
		$track = $this->getOriginal('soundcloud');
		$track = 'http://api.soundcloud.com/tracks/'.$track;

		return
			'http://w.soundcloud.com/player/?url='.$track.
			'&auto_play=false&show_artwork=true&color='.$this->color;
	}

	/**
	 * Save the movements as JSON
	 *
	 * @param array $movements
	 */
	public function setMovementsAttribute($movements)
	{
		$this->attributes['movements'] = json_encode($movements);
	}

	/**
	 * Decode movements on get
	 *
	 * @return array
	 */
	public function getMovementsAttribute()
	{
		return json_decode($this->getOriginal('movements'), true);
	}
}
