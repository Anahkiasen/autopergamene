<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Collections
	|--------------------------------------------------------------------------
	*/

	'collections' => array(),

	/*
	|--------------------------------------------------------------------------
	| Asset and Filter Aliases
	|--------------------------------------------------------------------------
	*/

	'aliases' => array(
		'filters' => array(

			/*
			|--------------------------------------------------------------------------
			| UglifyCss Filter Alias
			|--------------------------------------------------------------------------
			*/

			'UglifyCss' => array('UglifyCssFilter', function ($filter) {
				$filter->whenProductionBuild()->whenAssetIsStylesheet();
				$filter->setArgument('node_modules/.bin/uglifycss');
				$filter->beforeFiltering(function ($instance) {
					$instance->setUglyComments(true);
				});
			}),

			/*
			|--------------------------------------------------------------------------
			| UglifyJs2 Filter Alias
			|--------------------------------------------------------------------------
			*/

			'UglifyJs' => array('UglifyJs2Filter', function ($filter) {
				$filter->whenProductionBuild()->whenAssetIsJavascript();
				$filter->setArgument('node_modules/.bin/uglifyjs');
				$filter->beforeFiltering(function ($instance) {
					$instance->setCompress(true);
					$instance->setMangle(true);
				});
			}),

			/*
			|--------------------------------------------------------------------------
			| UriRewrite Filter Alias
			|--------------------------------------------------------------------------
			|
			| Filter gets a default argument of the path to the public directory.
			|
			*/

			'UriRewriteFilter' => array('UriRewriteFilter', function ($filter) {
				$filter->setArguments(public_path())->whenAssetIsStylesheet();
			}),

		)
	)
);
