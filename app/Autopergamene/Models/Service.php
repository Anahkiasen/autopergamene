<?php
namespace Autopergamene\Models;

use Autopergamene\Abstracts\AbstractModel;

class Service extends AbstractModel
{
    ////////////////////////////////////////////////////////////////////
    ///////////////////////////// ATTRIBUTES ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get the service's link as styled name
     *
     * @return string
     */
    public function getLinkNameAttribute()
    {
        return preg_replace('#(http://)(www.)?(.+)(/anahkiasen)#', '$3', $this->link);
    }
}
