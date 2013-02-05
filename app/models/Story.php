<?php
class Story extends Base
{

  // Attributes ---------------------------------------------------- /

  /**
   * Get the quotation with linebreaks
   */
  public function giveDescription()
  {
    return nl2br($this->getOriginal('description'));
  }

  /**
   * Get full path to the image
   */
  public function giveImage()
  {
    $image = $this->getOriginal('image');

    return URL::asset("app/img/novels/".$image);
  }

  /**
   * Get the Story's text
   */
  public function giveContent()
  {
    // Get story if it exists
    $storyService = App::make('Services\StoryServices');
    $markdown = $storyService->getMarkdownOf($this->id);
    if (!$markdown) return false;

    return $storyService->parseMarkdown($markdown);
  }
}