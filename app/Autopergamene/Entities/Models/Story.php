<?php
namespace Autopergamene\Entities\Models;

use App;
use Autopergamene\Abstracts\AbstractModel;
use Autopergamene\Traits\HasSlugId;
use File;
use League\CommonMark\CommonMarkConverter;
use URL;

/**
 * A short story
 */
class Story extends AbstractModel
{
    use HasSlugId;

    ////////////////////////////////////////////////////////////////////
    ///////////////////////////// ATTRIBUTES ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get the quotation with linebreaks
     */
    public function getDescriptionAttribute()
    {
        return nl2br($this->getOriginal('description'));
    }

    /**
     * Get full path to the image
     */
    public function getImageAttribute()
    {
        $image = $this->getOriginal('image');

        return URL::asset("app/img/novels/".$image);
    }

    /**
     * Get the Story's text
     */
    public function getContentAttribute()
    {
        $content = App::make('path').'/database/novels/'.$this->id.'.md';
        if (!File::exists($content)) {
            return false;
        }

        // Transform Markdown
        $markdown = new CommonMarkConverter();
        $content  = File::get($content);
        $content  = $markdown->convertToHtml($content);

        // Remove extra line breaks (yeah it's dirty)
        $content = nl2br($content);
        $content = preg_replace("#</(p|ul|h3)><br />\n<br />\n<(p|ul|h3)>#", '</$1><$2>', $content);
        $content = preg_replace("#(<br />\n)?<ul><br />#", '<ul>', $content);
        $content = str_replace("</li><br />", '</li>', $content);
        $content = str_replace("…", '...', $content);

        return $content;
    }
}
