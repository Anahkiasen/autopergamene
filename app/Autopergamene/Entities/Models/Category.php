<?php
namespace Autopergamene\Entities\Models;

use Autopergamene\Abstracts\AbstractModel;
use Autopergamene\Traits\HasSlugId;
use HTML;

/**
 * A media Category
 */
class Category extends AbstractModel
{
    use HasSlugId;

    /**
     * The localized fields
     *
     * @type array
     */
    protected $polyglot = ['description'];

    ////////////////////////////////////////////////////////////////////
    /////////////////////////// RELATIONSHIPS //////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get all articles in a Category
     *
     * @return Collection
     */
    public function articles()
    {
        return $this->hasMany(Article::class)->latest();
    }

    ////////////////////////////////////////////////////////////////////
    ///////////////////////////// ATTRIBUTES ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Whether the category points to an external link or not
     *
     * @return boolean
     */
    public function isExternal()
    {
        return (bool) $this->getOriginal('link');
    }

    /**
     * Get a link to the category's content
     *
     * @return string
     */
    public function getLinkAttribute()
    {
        // External link
        $link = $this->getOriginal('link');
        if ($link) {
            return $link;
        }

        return $this->getPath('show');
    }

    /**
     * Get the category's thumb
     *
     * @return string
     */
    public function getThumbAttribute()
    {
        return HTML::image('app/img/categories/'.$this->id.'.jpg', $this->name);
    }
}
