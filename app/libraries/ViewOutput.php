<?php
class ViewOutput extends Symfony\Component\Console\Output\Output
{
  /**
   * The messages in memory
   * @var array
   */
  static $compilation = array();

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
    return trim(implode('<br />', static::$compilation));
  }
}