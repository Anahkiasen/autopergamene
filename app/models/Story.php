<?php

class Story extends BaseModel
{

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
