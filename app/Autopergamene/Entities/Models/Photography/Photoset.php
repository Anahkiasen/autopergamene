<?php
namespace Autopergamene\Entities\Models\Photography;

use Autopergamene\Abstracts\AbstractModel;

/**
 * An album of Photos
 */
class Photoset extends AbstractModel
{
    ////////////////////////////////////////////////////////////////////
    /////////////////////////// RELATIONSHIPS //////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get the Photoset's Photos
     *
     * @return \Illuminate\Support\Collection
     */
    public function photos()
    {
        return $this->hasMany('Autopergamene\Entities\Models\Photography\Photo')->orderBy('name', 'asc');
    }

    /**
     * Get the thumbnail for the Photoset
     *
     * @return Photo
     */
    public function thumbnail()
    {
        return $this->hasOne('Autopergamene\Entities\Models\Photography\Photo')->thumbnails();
    }
}
