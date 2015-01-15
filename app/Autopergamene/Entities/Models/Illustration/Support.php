<?php
namespace Autopergamene\Entities\Models\Illustration;

use Autopergamene\Abstracts\AbstractModel;
use Autopergamene\Traits\HasSlugId;

/**
 * A Support holding various Illustrations
 */
class Support extends AbstractModel
{
    use HasSlugId;

    ////////////////////////////////////////////////////////////////////
    /////////////////////////// RELATIONSHIPS //////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get the Support's Illustrations
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function illustrations()
    {
        return $this->hasMany('Autopergamene\Entities\Models\Illustration\Illustration');
    }

    /**
     * Get the Support's Thumbnail
     *
     * @return mixed
     */
    public function thumbnail()
    {
        return $this->hasOne('Autopergamene\Entities\Models\Illustration\Illustration')->thumbnails();
    }

    ////////////////////////////////////////////////////////////////////
    ///////////////////////////// ATTRIBUTES ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get the folder of this support's illustrations
     *
     * @return string
     */
    public function getFolderAttribute()
    {
        return 'app/img/illustrations/'.$this->id.'/';
    }
}
