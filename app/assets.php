<?php

//////////////////////////////////////////////////////////////////////
//////////////////////////// APPLICATION /////////////////////////////
//////////////////////////////////////////////////////////////////////

/**
 * Base required assets for all pages
 */
Basset::collection('application', function($collection) {
	$collection->stylesheet('components/normalize-css/normalize.css');
	$collection->stylesheet('app/css/styles.css');

	$collection->javascript('app/js/scripts.js');
})
->rawOnEnvironment('local')
->apply('UriRewriteFilter')
->apply('UglifyCss')
->apply('UglifyJs');

/**
 * Polyfill scripts
 */
Basset::collection('modernizr', function($collection) {
	$collection->javascript('components/modernizr/modernizr.min.js');
	$collection->javascript('app/js/polyfill.js');
})
->rawOnEnvironment('local')
->apply('UglifyJs');

//////////////////////////////////////////////////////////////////////
//////////////////////// PAGE-SPECIFIC ASSETS ////////////////////////
//////////////////////////////////////////////////////////////////////

Basset::collection('article', function($collection) {
	$collection->stylesheet('components/rainbow/themes/tomorrow-night.css')->apply('UglifyCss');

	$collection->directory('components/rainbow/js', function($collection) {
		$collection->javascript('rainbow.min.js');
		$collection->javascript('language/generic.js');
		$collection->javascript('language/php.js');
	});

	$collection->javascript('app/js/article.js');
})
->rawOnEnvironment('local')
->apply('UglifyJs');

//////////////////////////////////////////////////////////////////////
//////////////////////////// MODULE ASSETS ///////////////////////////
//////////////////////////////////////////////////////////////////////

Basset::collection('lazyload', function($collection) {
	$collection->javascript('components/jquery/jquery.min.js');
	$collection->javascript('components/jquery.lazyload/jquery.lazyload.js');
	$collection->javascript('app/js/modules/lazyload.js');
})
->rawOnEnvironment('local')
->apply('UglifyJs');

Basset::collection('affixed', function($collection) {
	$collection->javascript('components/jquery/jquery.min.js');
	$collection->javascript('components/bootstrap/js/bootstrap-affix.js');
	$collection->javascript('components/bootstrap/js/bootstrap-scrollspy.js');
	$collection->javascript('app/js/modules/affixed.js');
})
->rawOnEnvironment('local')
->apply('UglifyJs');
