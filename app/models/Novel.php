<?php
use dflydev\markdown\MarkdownParser;

class Novel extends Base
{
  protected $table = 'novels';

  // Attributes ---------------------------------------------------- /

  /**
   * Get the quotation with linebreaks
   */
  public function getDescription()
  {
    return nl2br($this->getOriginal('description'));
  }

  /**
   * Get full path to the image
   */
  public function getImage()
  {
    $image = $this->getOriginal('image');

    return URL::asset("app/img/novels/".$image);
  }

  /**
   * Get the novel's text
   */
  public function getContent()
  {
    // Get novel if it exists
    $text = __DIR__.'/../database/novels/'.$this->id.'.md';
    if (File::exists($text)) $text = File::get($text);
    else return false;

    // Parse Markdown
    $markdown = new MarkdownParser();
    $text = $markdown->transformMarkdown($text);

    // Remove extra line breaks (yeah it's dirty)
    $text = nl2br($text);
    $text = preg_replace("#</(p|ul|h3)><br />\n<br />\n<(p|ul|h3)>#", '</$1><$2>', $text);
    $text = preg_replace("#(<br />\n)?<ul><br />#", '<ul>', $text);
    $text = String::replace($text, "</li><br />", '</li>');
    $text = String::replace($text, "…", '...');

    return $text;
  }
}