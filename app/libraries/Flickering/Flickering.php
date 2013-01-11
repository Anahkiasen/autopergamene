<?php
/**
 * Lastapi
 *
 * Handles calls and request to the Last.fm API
 * Caches responses and scrobble tracks
 */
namespace Flickering;

use \Session;

class Flickering
{
  /**
   * The API key
   * @var string
   */
  protected $key;

  /**
   * The API secret hash
   * @var string
   */
  protected $secret;

  /**
   * The format that will be returned from the API
   * @var string
   */
  protected $format = 'json';

  /**
   * The current instance of the API
   * @var Lastapi
   */
  protected static $singleton;

  // Setup --------------------------------------------------------- /

  /**
   * Setup the API with the given credientials
   *
   * @param  string $key    The API key
   * @param  string $secret The API secret hash
   */
  public static function handshake($key, $secret)
  {
    static::$singleton = new static($key, $secret);
  }

  /**
   * Get the current Lastapi instance
   *
   * @return Lastapi
   */
  public static function getInstance()
  {
    return static::$singleton;
  }

  /**
   * Setup an instance of the API
   *
   * @param string $key    The API key
   * @param string $secret The API secret hash
   */
  public function __construct($key, $secret)
  {
    $this->key    = $key;
    $this->secret = $secret;
  }

  /**
   * Execute a call to the API
   *
   * @param  string $method     The desired method
   * @param  array  $parameters Additional parameters
   * @return array              Resulting array
   */
  public static function __callStatic($method, $parameters = array())
  {
    $method = new Method($method, $parameters, static::$singleton);

    return $method;
  }

  // Getters ------------------------------------------------------- /

  public function getSession()
  {
    return Session::get('session');
  }

  public function getUser()
  {
    return Session::get('user');
  }

  public function getToken()
  {
    return Session::get('token');
  }

  public function getKey()
  {
    return $this->key;
  }

  public function getSecret()
  {
    return $this->secret;
  }

  public function getFormat()
  {
    return $this->format;
  }
}
