<?php
namespace Autopergamene;

class Track extends BaseModel
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'tracks';

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
    $track = 'http://api.soundcloud.com/tracks/' .$track;

    return
      'http://w.soundcloud.com/player/?url=' .$track.
      '&auto_play=false&show_artwork=true&color='.$this->color;
  }

  /**
   * Format movements for display
   */
  public function getMovementsAttribute()
  {
    $movements = $this->getOriginal('movements');

    // Format time and translation
    $movements = preg_replace('/([\d:]{5} - [\d:]{5}) : /', '<dt>$1</dt><dd>', $movements);
    $movements = preg_replace('/\(([^)]+)\)/', '<em>($1)</em></dd>', $movements);

    return $movements;
  }
}
