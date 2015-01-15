<?php
namespace Autopergamene\Models\Photography;

use Autopergamene\Abstracts\AbstractModel;
use HTML;

/**
 * A Photo in a Photoset
 */
class Photo extends AbstractModel
{
    /**
     * Aliases for sizes
     *
     * @type array
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

    ////////////////////////////////////////////////////////////////////
    /////////////////////////// RELATIONSHIPS //////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * The Photoset the Photo's in
     *
     * @return Photoset
     */
    public function photoset()
    {
        return $this->belongsTo('Autopergamene\Models\Photography\Photoset');
    }

    // Sizes --------------------------------------------------------- /

    /**
     * Get the URL to a photo
     *
     * @param string $size
     *
     * @return string
     */
    public function size($size)
    {
        $size  = static::$sizes[$size];
        $image = $size
            ? $this->farm.'_'.$size
            : $this->farm;

        return $image.'.jpg';
    }

    ////////////////////////////////////////////////////////////////////
    ///////////////////////////// ATTRIBUTES ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Format a photo's index
     *
     * @param $key
     *
     * @return string
     */
    public function index($key)
    {
        $padding = 2 - strlen($key);
        $padding = ($padding > 0) ? str_repeat('0', $padding) : '';

        return $padding.$key;
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
