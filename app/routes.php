<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////////// ROUTES ///////////////////////////////
//////////////////////////////////////////////////////////////////////

$routes = function () {
	Route::get('/', 'CategoriesController@categories');

	Route::get('category/graceful-degradation', 'RepositoriesController@repositories');

	Route::get('category/en-averse-dencre',                   'ArticlesController@articles');
	Route::get('category/en-averse-dencre/article/{article}', 'ArticlesController@article');

	Route::get('category/memorabilia',                  'PhotographiesController@collections');
	Route::get('category/memorabilia/album/{photoset}', 'PhotographiesController@photoset');

	Route::get('category/les-fleurs-davril',               'StoriesController@stories');
	Route::get('category/les-fleurs-davril/story/{story}', 'StoriesController@story');

	Route::get('category/illustration',                   'IllustrationsController@supports');
	Route::get('category/illustration/support/{support}', 'IllustrationsController@support');

	Route::get('category/{category}', 'CategoriesController@category');
};

Config::set('app.locale', Request::segment(1) ?: 'fr');

Route::get('/', function() {
	return Redirect::to(Config::get('app.locale'));
});

// Languages
Route::group(['prefix' => 'fr'], $routes);
Route::group(['prefix' => 'en'], $routes);