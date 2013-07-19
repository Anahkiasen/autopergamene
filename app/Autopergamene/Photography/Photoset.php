<?php
namespace Autopergamene\Photography;

use Autopergamene\BaseModel;

/**
 * An album of Photos
 */
class Photoset extends BaseModel
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'photosets';

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// RELATIONSHIPS //////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get the Photoset's Photos
   *
   * @return Illuminate\Support\Collection
   */
  public function photos()
  {
    return $this->hasMany('Autopergamene\Photography\Photo')->orderBy('name', 'asc');
  }

  /**
   * Get the thumbnail for the Photoset
   *
   * @return Photo
   */
  public function thumbnail()
  {
    return $this->hasOne('Autopergamene\Photography\Photo')->thumbnails();
  }
}
