<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////////// ROUTES ///////////////////////////////
//////////////////////////////////////////////////////////////////////

Route::get('/', 'CategoriesController@categories');

// Action aliases -------------------------------------------------- /

Route::get('category/{slug}',                                'CategoriesController@category');
Route::get('category/{categorySlug}/articles/{articleSlug}', 'ArticlesController@article');
Route::get('category/illustration/support/{id}',             'CategoriesController@support');
Route::get('category/les-fleurs-davril/story/{id}',          'CategoriesController@story');
Route::get('category/memorabilia/album/{id}',                'CategoriesController@album');
