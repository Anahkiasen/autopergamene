<?php

//////////////////////////////////////////////////////////////////////
//////////////////////////// APPLICATION /////////////////////////////
//////////////////////////////////////////////////////////////////////

/**
 * Base required assets for all pages
 */
Basset::collection('application', function($collection) {
  $collection->add('components/normalize/normalize.css');
  $collection->add('app/css/styles.css')->apply('UriRewrite');

  $collection->add('app/js/scripts.js');
});