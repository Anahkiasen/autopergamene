<?php
class Support extends Eloquent
{

  protected $table = 'supports';

  // Relationships ------------------------------------------------- /

  public function illustrations()
  {
    return $this->hasMany('Illustration');
  }

  public function thumbnail()
  {
    return $this->hasOne('Illustration')->where('thumbnail', '=', 1);
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Get the folder of this support's illustrations
   */
  public function getFolder()
  {
    return 'app/img/illustrations/'.$this->id.'/';
  }
}