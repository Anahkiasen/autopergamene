<?php
class Support extends Base
{
  // Relationships ------------------------------------------------- /

  public function illustrations()
  {
    return $this->hasMany('Illustration');
  }

  public function thumbnail()
  {
    return $this->hasOne('Illustration')->thumbnails();
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Get the folder of this support's illustrations
   */
  public function getFolderAttribute()
  {
    return 'app/img/illustrations/'.$this->id.'/';
  }
}