<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////////// ROUTES ///////////////////////////////
//////////////////////////////////////////////////////////////////////

Route::groupLocale(['namespace' => 'Autopergamene\Controllers'], function () {

	Route::get('/', ['as' => 'home', 'uses' => 'CategoriesController@index']);

	Route::get('category/graceful-degradation', 'RepositoriesController@index');

	Route::get('category/en-averse-dencre',                   'ArticlesController@index');
	Route::get('category/en-averse-dencre/article/{article}', 'ArticlesController@show');

	Route::get('category/memorabilia',                  'PhotographiesController@index');
	Route::get('category/memorabilia/album/{photoset}', 'PhotographiesController@show');

	Route::get('category/les-fleurs-davril',               'StoriesController@index');
	Route::get('category/les-fleurs-davril/story/{story}', 'StoriesController@show');

	Route::get('category/illustration',                   'SupportsController@index');
	Route::get('category/illustration/support/{support}', 'SupportsController@show');

	Route::get('category/{category}', 'CategoriesController@show');

});
