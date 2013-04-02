<?php
class Photo extends Base
{
  /**
   * Aliases for sizes
   * @var array
   */
  private static $sizes = array(
    'square'       => 's',
    'large_square' => 'q',
    'thumbnail'    => 't',
    'small'        => 'n',
    'medium'       => '',
    'medium_large' => 'z',
    'large'        => 'b',
    'original'     => 'o',
  );

  // Relationships ------------------------------------------------- /

  public function photoset()
  {
    return $this->belongsTo('Photoset');
  }

  // Sizes --------------------------------------------------------- /

  /**
   * Get the URL to a photo
   */
  public function size($size)
  {
    $size = static::$sizes[$size];
    $image = $size
      ? $this->farm.'_'.$size
      : $this->farm;

    return $image.'.jpg';
  }

  /**
   * Dynamic size getting
   */
  public function __get($method)
  {
    // Get a size
    if (isset(static::$sizes[$method])) {
      return $this->size($method);
    }

    return parent::__get($method);
  }

  // Attributes ---------------------------------------------------- /

  /**
   * Format a photo's index
   */
  public function index($key)
  {
    return Number::paddingLeft($key, 2);
  }

  /**
   * Render the photo
   *
   * @return string
   */
  public function __toString()
  {
    return HTML::image($this->large_square, $this->surname);
  }
}
