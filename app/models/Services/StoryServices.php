<?php
/**
 * StoryServices
 *
 * Various helpers to format stories
 */
namespace Services;

use App;
use dflydev\markdown\MarkdownParser;
use File;

class StoryServices
{
  /**
   * Bind dependencies
   *
   * @param MarkdownParser $markdownParser
   */
  public function __construct(MarkdownParser $markdownParser)
  {
    $this->markdownParser = $markdownParser;
  }

  /**
   * Fetches the content of a Markdown-format story
   *
   * @param string $slug The Story slug
   *
   * @return string The story's content
   */
  public function getMarkdownOf($slug)
  {
    $markdown = App::make('path').'/database/novels/'.$slug.'.md';

    return File::exists($markdown) ? File::get($markdown) : null;
  }

  /**
   * Parses a Story's Markdown into HTML
   *
   * @param string $markdown The Markdown story
   *
   * @return string HTML-formatted story
   */
  public function parseMarkdown($markdown)
  {
    // Parse Markdown to HTML
    $text = $this->markdownParser->transformMarkdown($markdown);

    // Remove extra line breaks (yeah it's dirty)
    $text = nl2br($text);
    $text = preg_replace("#</(p|ul|h3)><br />\n<br />\n<(p|ul|h3)>#", '</$1><$2>', $text);
    $text = preg_replace("#(<br />\n)?<ul><br />#", '<ul>', $text);
    $text = str_replace("</li><br />", '</li>', $text);
    $text = str_replace("…", '...', $text);

    return $text;
  }
}
