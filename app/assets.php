<?php

//////////////////////////////////////////////////////////////////////
//////////////////////////// APPLICATION /////////////////////////////
//////////////////////////////////////////////////////////////////////

/**
 * Base required assets for all pages
 */
Basset::collection('application', function($collection) {
  $collection->add('components/normalize-css/normalize.css');
  $collection->add('app/css/styles.css');

  $collection->add('app/js/scripts.js');
})
->rawOnEnvironment('local')
->apply('UriRewriteFilter')
->apply('CssMin');

/**
 * Polyfill scripts
 */
Basset::collection('modernizr', function($collection) {
  $collection->add('components/respond/respond.min.js');
  $collection->add('components/modernizr/modernizr.min.js');
  $collection->add('app/js/polyfill.js');
})
->rawOnEnvironment('local')
->apply('JsMin');

//////////////////////////////////////////////////////////////////////
//////////////////////////// ARTICLE VIEW ////////////////////////////
//////////////////////////////////////////////////////////////////////

Basset::collection('lazyload', function($collection) {
  $collection->add('components/jquery/jquery.min.js');
  $collection->add('components/jquery.lazyload/jquery.lazyload.js');
  $collection->add('app/js/lazyload.js');
})
->rawOnEnvironment('local')
->apply('JsMin');

Basset::collection('article', function($collection) {
  $collection->add('components/rainbow/themes/tomorrow-night.css')->apply('CssMin');

  $collection->directory('name: rainbow', function($collection) {
    $collection->add('rainbow.min.js');
    $collection->add('language/generic.js');
    $collection->add('language/php.js');
  });

  $collection->add('app/js/article.js');
})
->rawOnEnvironment('local')
->apply('JsMin');

//////////////////////////////////////////////////////////////////////
///////////////////////// AFFIXED NAVIGATION /////////////////////////
//////////////////////////////////////////////////////////////////////

Basset::collection('affixed', function($collection) {
  $collection->add('components/jquery/jquery.min.js');
  $collection->add('components/bootstrap/js/bootstrap-affix.js');
  $collection->add('components/bootstrap/js/bootstrap-scrollspy.js');
  $collection->add('app/js/affixed.js');
})
->rawOnEnvironment('local')
->apply('JsMin');
