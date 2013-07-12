<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
  /**
   * Creates the application.
   *
   * @return Symfony\Component\HttpKernel\HttpKernelInterface
   */
  public function createApplication()
  {
    $unitTesting     = true;
    $testEnvironment = 'testing';

    return require __DIR__.'/../../bootstrap/start.php';
  }

  ////////////////////////////////////////////////////////////////////
  //////////////////////////////// COLORS ////////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Print an info
   *
   * @param  string $message
   *
   * @return string
   */
  public function line($message)
  {
    print $message.PHP_EOL;
  }

  /**
   * Print an info
   *
   * @param  string $message
   *
   * @return string
   */
  public function success($message)
  {
    $this->line("\033[0;32m" .$message. "\033[0m");
  }

  /**
   * Print an info
   *
   * @param  string $message
   *
   * @return string
   */
  public function info($message)
  {
    $this->line("\033[0;34m" .$message. "\033[0m");
  }

  /**
   * Print an error
   *
   * @param  string $message
   *
   * @return string
   */
  public function error($message)
  {
    $this->line("\033[0;31m" .$message. "\033[0m");
  }

  /**
   * Print a comment
   *
   * @param  string $message
   *
   * @return string
   */
  public function comment($message)
  {
    $this->line("\033[0;35m" .$message. "\033[0m");
  }
}
