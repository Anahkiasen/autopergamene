<?php
namespace Autopergamene;

class Support extends BaseModel
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'supports';

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// RELATIONSHIPS //////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get the Support's Illustrations
   *
   * @return Collectino
   */
  public function illustrations()
  {
    return $this->hasMany('Autopergamene\Illustration');
  }

  /**
   * Get the Support's Thumbnail
   *
   * @return Illuminage
   */
  public function thumbnail()
  {
    return $this->hasOne('Autopergamene\Illustration')->thumbnails();
  }

  ////////////////////////////////////////////////////////////////////
  ///////////////////////////// ATTRIBUTES ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Get the folder of this support's illustrations
   */
  public function getFolderAttribute()
  {
    return 'app/img/illustrations/'.$this->id.'/';
  }
}
