<?php
namespace Flickering;

use \Cache;
use \Underscore\Parse;
use \Underscore\Types\String;

class Helpers
{
  /**
   * Gets the content from a Method
   *
   * @param  Method $method The Method to fetch
   * @return array          The resulting array
   */
  public static function query(\Flickering\Method $method)
  {
    // Cache cURL request ------------------------------------------ /

    $content = Cache::remember($method->hash, $method->cacheTime(), function() use ($method) {
      $c = curl_init($method->query);
      curl_setopt($c, CURLOPT_POST, true);
      curl_setopt($c, CURLOPT_ENCODING, 'UTF-8');
      curl_setopt($c, CURLOPT_POSTFIELDS, $method->post);
      curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($c, CURLOPT_HTTPHEADER, array('Expect:'));

      $content = curl_exec($c);
      $content = String::remove($content, 'jsonFlickrApi(');
      $content = substr($content, 0, -1);

      return Parse::fromJSON($content);
    });

    // Display errors ---------------------------------------------- /

    if ($content['stat'] and $content['stat'] == 'fail') {
      echo '<pre>' .print_r((object) array(
        'error'     => $content['code'],
        'message'   => $content['message'],
        'session'   => Flickering::getInstance()->getSession(),
        'token'     => Flickering::getInstance()->getToken(),
        'signature' => $method->signature,
        'GET'       => $method->query,
        //'POST'      => explode('&', $method->post),
      ),true). '</pre>';
      exit();
    }

    return $content;
  }
}
