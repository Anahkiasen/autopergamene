<?php
class Repository extends Eloquent
{
  public function getLinkAttribute()
  {
    return 'https://github.com/' .$this->vendor. '/'.$this->package;
  }

  public function getStatusAttribute()
  {
    $image = 'https://secure.travis-ci.org/' .$this->vendor. '/' .$this->package. '.png';

    return HTML::image($image, 'Travis status', array('class' => 'build'));
  }

  public function getButton($type)
  {
    return '<iframe src="http://ghbtns.com/github-btn.html?'.
      'user=' .$this->vendor.
      '&repo=' .$this->package.
      '&type=' .$type.
      '&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="85" height="20"></iframe>';
  }
}