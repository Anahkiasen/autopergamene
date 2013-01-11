<?php
namespace Flickering;

use \Cache;
use \Config;
use \Underscore\Types\Arrays;
use \Underscore\Types\String;

class Method
{
  /**
   * The API instance to use
   * @var string
   */
  private $api;

  /**
   * Additional POST data to query
   * @var array
   */
  public $post = array();

  /**
   * The URL to query for results
   * @var string
   */
  public $query;

  /**
   * The method cache has
   * @var string
   */
  public $hash;

  /**
   * A potential alias for the method
   * @var string
   */
  public $alias;

  /**
   * The results from the query
   * @var array
   */
  private $results;

  /**
   * Fire up a new call to the API
   *
   * @param string $method     The method to call
   * @param array  $parameters The method parameters
   * @param string $lastapi    The Last.fm instance to use
   */
  public function __construct($method, $parameters, Flickering $api)
  {
    $this->api     = $api;
    $this->results = call_user_func_array(array($this, $method), $parameters);
  }

  /**
   * Execute the call
   *
   * @return array The result from the call
   */
  public function execute()
  {
    if (Cache::has($this->hash)) $this->results = Cache::get($this->hash);
    else $this->results = Helpers::query($this);
    return $this->results;
  }

  /**
   * Get the results from a call
   *
   * @return array The results
   */
  public function results()
  {
    // Get results if any
    $this->results = (array) $this->execute();
    $this->results = Arrays::first($this->results);

    return (object) $this->results;
  }

  /**
   * Whether the method requires a signature
   *
   * @return boolean
   */
  private function requiresSignature()
  {
    return false;
  }

  /**
   * Get the hash for a method
   *
   * @param string $method     The method
   * @param array  $parameters Its parameters
   *
   * @return string A method hash
   */
  private function getHash($method, $parameters)
  {
    $hash = 'method-'.$method.'-';
    foreach($parameters as $k => $v) $parameters[$k] = $k.'-'.$v;

    return String::slugify($hash.implode('-', $parameters));
  }

  // Methods ------------------------------------------------------- /

  /**
   * Get all collections from an user
   *
   * @param string $user_id The user ID
   */
  private function photosetsGetList($user_id = null)
  {
    return $this->fetch('photosets.getList', array(
      'user_id' => $user_id,
    ));
  }

  private function photosetsGetInfo($photoset_id)
  {
    return $this->fetch('photosets.getInfo', array(
      'photoset_id' => $photoset_id,
    ));
  }

  private function photosetsGetPhotos($photoset_id)
  {
    return $this->fetch('photosets.getPhotos', array(
      'photoset_id' => $photoset_id,
    ));
  }

  private function photosGetSizes($photo_id)
  {
    return $this->fetch('photos.getSizes', array(
      'photo_id' => $photo_id,
    ));
  }

  // Helpers ------------------------------------------------------- /

  public function cacheTime()
  {
    return Config::get('flickering.cache');
  }

  /**
   * Fetch informations from the Last.fm API
   *
   * @param  string $method     The method
   * @param  array  $parameters Its parameters
   * @return object             The result
   */
  private function fetch($method, $parameters = array())
  {
    // Compose method and hash
    $this->method = 'flickr.'.$method;
    $this->hash = $this->getHash($this->method, $parameters);

    // Check if we haven't already cached this method
    if (Cache::has($this->hash)) return $this;

    // Add base parameters
    $parameters = array_merge($parameters, array(
      'method'  => $this->method,
      'api_key' => $this->api->getKey(),
      'user'    => $this->api->getUser(),
      'format'  => $this->api->getFormat(),
    ));

    // Sort them
    ksort($parameters);

    // Create signature hash
    foreach ($parameters as $k => $v) {

      // Skip empty arguments
      if(!$v) continue;

      // Add to hash
      $get[] = $k.'='.$v;

      // Add to signature
      if($k != 'format') $signature[] = $k.$v;
    }

    // Add call signature to GET and POST
    $this->signature = implode(null, $signature).$this->api->getSecret();
    if ($this->requiresSignature()) $get[] = 'api_sig='.md5($this->signature);
    $post = implode('&', $get);

    // Create GET and POST data for the request
    $this->query = 'http://api.flickr.com/services/rest/';
    $this->query .= '?'.$post;

    return $this;
  }
}
