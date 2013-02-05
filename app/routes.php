<?php

//////////////////////////////////////////////////////////////////////
////////////////////////////// NAMESPACES ////////////////////////////
//////////////////////////////////////////////////////////////////////

View::addLocation(__DIR__.'/views/layouts');
View::addLocation(__DIR__.'/views/partials');
View::addLocation(__DIR__.'/views/categories/subcategories');

//////////////////////////////////////////////////////////////////////
/////////////////////////////// ROUTES ///////////////////////////////
//////////////////////////////////////////////////////////////////////

Route::any('/', function() {
  return View::make('home');
});

// Display a category ---------------------------------------------- /

Route::any('category/{slug}', array(
  'as'   => 'category',
  'uses' => 'CategoriesController@getCategory'));

//////////////////////////////////////////////////////////////////////
///////////////////////////// SUBROUTES //////////////////////////////
//////////////////////////////////////////////////////////////////////

// Display an article ---------------------------------------------- /

Route::any('category/{categorySlug}/articles/{articleSlug}', array(
  'as'   => 'article',
  'uses' => 'ArticlesController@getArticle'));

// Display a support ----------------------------------------------- /

Route::any('category/illustration/support/{id}', array(
  'as'   => 'support',
  'uses' => 'CategoriesController@getSupport'));

// Display a story ------------------------------------------------- /

Route::any('category/les-fleurs-davril/story/{id}', array(
  'as'   => 'story',
  'uses' => 'CategoriesController@getStory'));

// Display a photoset ---------------------------------------------- /

Route::any('category/memorabilia/album/{id}', array(
  'as'   => 'photoset',
  'uses' => 'CategoriesController@getAlbum'));

//////////////////////////////////////////////////////////////////////
//////////////////////////// MAINTENANCE /////////////////////////////
//////////////////////////////////////////////////////////////////////

// Recompile local assets ------------------------------------------ /

Route::get('basset/compile', function() {
  Artisan::call('basset:compile', array(), new ViewOutput());

  return View::make('artisan')
    ->with('results', ViewOutput::getResults());
});
