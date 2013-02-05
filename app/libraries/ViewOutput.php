<?php
/**
 * ViewOutput
 *
 * Basic View output for Symfony Console
 */
use Symfony\Component\Console\Output\Output;

class ViewOutput extends Output
{
  /**
   * The messages in memory
   * @var array
   */
  private static $compilation = array();

  /**
   * Write a message
   *
   * @param string $message The message
   * @param boolean $newline Newline or not
   *
   * @return void
   */
  public function doWrite($message, $newline)
  {
    static::$compilation[] = $message.($newline ? PHP_EOL : null);
  }

  /**
   * Get compilation results
   *
   * @return string
   */
  public static function getResults()
  {
    $results = implode('<br />', static::$compilation);

    return trim($results);
  }
}