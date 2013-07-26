<?php
namespace Autopergamene;

use App;
use URL;
use File;

/**
 * A short story
 */
class Story extends BaseModel
{
  use Traits\HasSlugId;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'stories';

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
    $content = File::get($content);
    $content = App::make('dflydev\markdown\MarkdownParser')->transformMarkdown($content);

    // Remove extra line breaks (yeah it's dirty)
    $content = nl2br($content);
    $content = preg_replace("#</(p|ul|h3)><br />\n<br />\n<(p|ul|h3)>#", '</$1><$2>', $content);
    $content = preg_replace("#(<br />\n)?<ul><br />#", '<ul>', $content);
    $content = str_replace("</li><br />", '</li>', $content);
    $content = str_replace("…", '...', $content);

    return $content;
  }
}
