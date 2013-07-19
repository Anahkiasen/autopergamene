<?php
namespace Autopergamene;

use App;
use URL;

/**
 * A short story
 */
class Story extends BaseModel
{
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
    // Get story if it exists
    $storyService = App::make('Services\StoryServices');
    $markdown = $storyService->getMarkdownOf($this->id);

    if (!$markdown) return false;
    return $storyService->parseMarkdown($markdown);
  }
}
