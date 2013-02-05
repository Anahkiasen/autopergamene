<?php
/**
 * StoryServices
 *
 * Various helpers to format stories
 */
namespace Services;

use \File;
use \dflydev\markdown\MarkdownParser;
use \Underscore\Types\String;

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
    $markdown = __DIR__.'/../../database/novels/'.$slug.'.md';

    if (File::exists($markdown)) $markdown = File::get($markdown);
    else $markdown = null;

    return $markdown;
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
    $text = String::replace($text, "</li><br />", '</li>');
    $text = String::replace($text, "…", '...');

    return $text;
  }
}