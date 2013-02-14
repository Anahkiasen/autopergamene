<?php

//////////////////////////////////////////////////////////////////////
//////////////////////////// APPLICATION /////////////////////////////
//////////////////////////////////////////////////////////////////////

/**
 * Base required assets for all pages
 */
Basset::collection('application', function($collection) {
  $collection->add('components/normalize/normalize.css')->apply('CssMin');
  $collection->add('app/css/styles.css')->apply('UriRewriteFilter')->apply('CssMin');

  $collection->add('app/js/scripts.js');
});

/**
 * Polyfill scripts
 */
Basset::collection('modernizr', function($collection) {
  $collection->add('components/respond/respond.min.js');
  $collection->add('components/modernizr/modernizr.min.js');
  $collection->add('app/js/polyfill.js');
});

//////////////////////////////////////////////////////////////////////
//////////////////////////// ARTICLE VIEW ////////////////////////////
//////////////////////////////////////////////////////////////////////

Basset::collection('article', function($collection) {
  $collection->add('components/rainbow/themes/tomorrow-night.css')->apply('CssMin');

  $collection->directory('name: rainbow', function($collection) {
    $collection->add('rainbow.min.js');
    $collection->add('language/generic.js');
    $collection->add('language/php.js');
  });

  $collection->add('app/js/article.js')->apply('JsMin');
});

//////////////////////////////////////////////////////////////////////
///////////////////////// AFFIXED NAVIGATION /////////////////////////
//////////////////////////////////////////////////////////////////////

Basset::collection('affixed', function($collection) {
  $collection->add('components/jquery/jquery.min.js');
  $collection->add('components/bootstrap/js/bootstrap-affix.js');
  $collection->add('components/bootstrap/js/bootstrap-scrollspy.js');
  $collection->add('app/js/affixed.js');
});