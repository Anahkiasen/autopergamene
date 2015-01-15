<?php
namespace Autopergamene\Models\Illustration;

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
        return $this->hasMany('Autopergamene\Models\Illustration\Illustration');
    }

    /**
     * Get the Support's Thumbnail
     *
     * @return mixed
     */
    public function thumbnail()
    {
        return $this->hasOne('Autopergamene\Models\Illustration\Illustration')->thumbnails();
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
