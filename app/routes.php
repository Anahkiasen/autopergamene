<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////////// ROUTES ///////////////////////////////
//////////////////////////////////////////////////////////////////////

Route::get('/', 'CategoriesController@categories');

// Action aliases -------------------------------------------------- /

Route::get('category/memorabilia',            'PhotographiesController@collections');
Route::get('category/memorabilia/album/{id}', 'PhotographiesController@photoset');

Route::get('category/les-fleurs-davril',            'StoriesController@stories');
Route::get('category/les-fleurs-davril/story/{id}', 'StoriesController@story');

Route::get('category/illustration',              'IllustrationsController@supports');
Route::get('category/illustration/support/{id}', 'IllustrationsController@support');

Route::get('category/{slug}',                                'CategoriesController@category');
Route::get('category/{categorySlug}/articles/{articleSlug}', 'ArticlesController@article');
