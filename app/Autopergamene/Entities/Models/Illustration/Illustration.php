<?php
namespace Autopergamene\Entities\Models\Illustration;

use Autopergamene\Abstracts\AbstractModel;
use HTML;
use Illuminage\Facades\Illuminage;

/**
 * An Illustration
 */
class Illustration extends AbstractModel
{
    ////////////////////////////////////////////////////////////////////
    /////////////////////////// RELATIONSHIPS //////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get the Support this Illustration belongs to
     *
     * @return Support
     */
    public function support()
    {
        return $this->belongsTo(Support::class);
    }

    ////////////////////////////////////////////////////////////////////
    ///////////////////////////// ATTRIBUTES ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get a thumb of the illustration
     *
     * @param string      $folder
     * @param string|null $name
     *
     * @return string
     */
    public function thumb($folder, $name = null)
    {
        $builder = app('glide.url');
        $image   = $builder->getUrl($folder.$this->image, ['w' => 200, 'h' => 200, 'fit' => 'crop']);

        if (!$name) {
            $name = $this->name;
        }

        return HTML::image($image, $name);
    }

    /**
     * Display the illustration
     *
     * @param string $folder
     *
     * @return string
     */
    public function image($folder)
    {
        return HTML::lazyLoad($folder.$this->image, $this->name);
    }
}
