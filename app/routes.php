<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////////// ROUTES ///////////////////////////////
//////////////////////////////////////////////////////////////////////

Route::get('/', 'CategoriesController@getCategories');

// Display a category ---------------------------------------------- /

Route::get('category/{slug}', array(
  'as'   => 'category',
  'uses' => 'CategoriesController@getCategory'));

//////////////////////////////////////////////////////////////////////
///////////////////////////// SUBROUTES //////////////////////////////
//////////////////////////////////////////////////////////////////////

// Display an article ---------------------------------------------- /

Route::get('category/{categorySlug}/articles/{articleSlug}', array(
  'as'   => 'article',
  'uses' => 'ArticlesController@getArticle'));

// Display a support ----------------------------------------------- /

Route::get('category/illustration/support/{id}', array(
  'as'   => 'support',
  'uses' => 'CategoriesController@getSupport'));

// Display a story ------------------------------------------------- /

Route::get('category/les-fleurs-davril/story/{id}', array(
  'as'   => 'story',
  'uses' => 'CategoriesController@getStory'));

// Display a photoset ---------------------------------------------- /

Route::get('category/memorabilia/album/{id}', array(
  'as'   => 'photoset',
  'uses' => 'CategoriesController@getAlbum'));
