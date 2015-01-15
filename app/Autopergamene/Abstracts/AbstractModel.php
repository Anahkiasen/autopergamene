<?php
namespace Autopergamene\Abstracts;

use Arrounded\Traits\JsonAttributes;
use Arrounded\Traits\Reflection\ReflectionModel;
use Autopergamene\Query;
use Polyglot\Polyglot;

/**
 * An abstract Model to extend
 */
abstract class AbstractModel extends Polyglot
{
    use JsonAttributes;
    use ReflectionModel {
        getController as getRawController;
    }

    ////////////////////////////////////////////////////////////////////
    /////////////////////////////// FETCHERS ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get where thumbnails only
     *
     * @param Query $query
     *
     * @return  Query
     */
    public static function scopeThumbnails($query)
    {
        return $query->where('thumbnail', 1);
    }

    /**
     * Get the controller name
     *
     * @return string
     */
    public function getController()
    {
        return 'Autopergamene\Controllers\\'.$this->getRawController();
    }
}
