<?php
namespace Autopergamene\Entities\Models\Photography;

use Autopergamene\Abstracts\AbstractModel;

/**
 * A Collection of Photosets
 */
class Collection extends AbstractModel
{
    ////////////////////////////////////////////////////////////////////
    /////////////////////////// RELATIONSHIPS //////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get all the Photosets in a Collection
     *
     * @return \Illuminate\Support\Collection
     */
    public function photosets()
    {
        return $this->belongsToMany('Autopergamene\Entities\Models\Photography\Photoset')->latest();
    }
}
