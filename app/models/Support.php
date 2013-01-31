<?php
class Support extends Eloquent
{
  // Relationships ------------------------------------------------- /

  public function illustrations()
  {
    return $this->hasMany('Illustration');
  }

  public function thumbnail()
  {
    return $this->hasOne('Illustration')->where('thumbnail', 1);
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Get the folder of this support's illustrations
   */
  public function giveFolder()
  {
    return 'app/img/illustrations/'.$this->id.'/';
  }
}