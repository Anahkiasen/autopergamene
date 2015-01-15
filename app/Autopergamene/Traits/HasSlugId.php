<?php
namespace Autopergamene\Traits;

trait HasSlugId
{
    /**
     * Get the Model's slug
     *
     * @return string
     */
    public function getSlugAttribute()
    {
        return $this->id;
    }
}
