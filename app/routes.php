<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////////// ROUTES ///////////////////////////////
//////////////////////////////////////////////////////////////////////

Route::get('/', 'CategoriesController@categories');

// Display a category ---------------------------------------------- /

Route::get('category/{slug}', array(
  'as'   => 'category',
  'uses' => 'CategoriesController@category'));

//////////////////////////////////////////////////////////////////////
///////////////////////////// SUBROUTES //////////////////////////////
//////////////////////////////////////////////////////////////////////

// Display an article ---------------------------------------------- /

Route::get('category/{categorySlug}/articles/{articleSlug}', array(
  'as'   => 'article',
  'uses' => 'ArticlesController@article'));

// Display a support ----------------------------------------------- /

Route::get('category/illustration/support/{id}', array(
  'as'   => 'support',
  'uses' => 'CategoriesController@support'));

// Display a story ------------------------------------------------- /

Route::get('category/les-fleurs-davril/story/{id}', array(
  'as'   => 'story',
  'uses' => 'CategoriesController@story'));

// Display a photoset ---------------------------------------------- /

Route::get('category/memorabilia/album/{id}', array(
  'as'   => 'photoset',
  'uses' => 'CategoriesController@album'));
