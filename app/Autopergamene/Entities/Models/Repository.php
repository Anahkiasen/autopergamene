<?php
namespace Autopergamene\Entities\Models;

use Autopergamene\Abstracts\AbstractModel;
use HTML;

class Repository extends AbstractModel
{
    /**
     * @type array
     */
    protected $fillable = ['name', 'content', 'tags', 'vendor', 'package', 'downloads'];

    ////////////////////////////////////////////////////////////////////
    ///////////////////////////// ATTRIBUTES ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Return tags as array
     *
     * @return array
     */
    public function getTagsAttribute()
    {
        return json_decode($this->getOriginal('tags'), true);
    }

    /**
     * Save tags as JSON
     *
     * @param array $tags
     */
    public function setTagsAttribute($tags)
    {
        $this->attributes['tags'] = json_encode($tags);
    }

    /**
     * Get a link to the Repository's author
     *
     * @return string
     */
    public function getAuthorAttribute()
    {
        $link = 'https://github.com/'.$this->vendor;

        return HTML::linkBlank($link, ucfirst($this->vendor));
    }

    /**
     * Get link to the Github page
     *
     * @return string
     */
    public function getLinkAttribute()
    {
        return 'https://github.com/'.$this->vendor.'/'.$this->package;
    }

    /**
     * Get Travis status
     *
     * @return string
     */
    public function getStatusAttribute()
    {
        $vendor = $this->vendor === 'anahkiasen' ? ucfirst($this->vendor) : $this->vendor;
        $image  = 'https://secure.travis-ci.org/'.$vendor.'/'.$this->package.'.png';

        return HTML::image($image, 'Travis status', array('class' => 'build'));
    }

    /**
     * Get Github buttons
     *
     * @param string $type Type of button
     *
     * @return string
     */
    public function getButton($type)
    {
        return '<iframe src="http://ghbtns.com/github-btn.html?'.
        'user='.$this->vendor.
        '&repo='.$this->package.
        '&type='.$type.
        '&count=true" allowtransparency="true" frameborder="0" scrolling="0" width="85" height="20"></iframe>';
    }
}
