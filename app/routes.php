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

Route::any('category/{slug}', array('as' => 'category', 'do' => function($slug) {
  $category = Category::find($slug);

  return View::make('categories.'.$slug)
    ->with('category', $category);
}));

//////////////////////////////////////////////////////////////////////
///////////////////////////// SUBROUTES //////////////////////////////
//////////////////////////////////////////////////////////////////////

// Display an article ---------------------------------------------- /

Route::any('category/{slug}/articles/{id}', array(
  'as' => 'article',
  'do' => function($slug, $article_id) {
    $category = Category::find($slug);
    $article = Article::find($article_id);

    return View::make('article')
      ->with('category', $category)
      ->with('article', $article);
}));

// Display a support ----------------------------------------------- /

Route::any('category/illustration/support/{id}', array(
  'as' => 'support',
  'do' => function($slug) {
    $support  = Support::with('illustrations')->find($slug);
    $category = Category::find('illustration');

    return View::make('support')
      ->with('category', $category)
      ->with('support', $support);
}));

// Display a novel ------------------------------------------------- /

Route::any('category/les-fleurs-davril/story/{id}', array(
  'as' => 'novel',
  'do' => function($slug) {
    $novel = Novel::find($slug);
    $category = Category::find('les-fleurs-davril');

    return View::make('novel')
      ->with('category', $category)
      ->with('novel', $novel);
}));

// Display a photoset ---------------------------------------------- /

Route::any('category/memorabilia/album/{id}', array(
  'as' => 'photoset',
  'do' => function($slug) {
    $photoset = Photoset::where('slug', $slug)->first();
    $category = Category::find('memorabilia');

    return View::make('photoset')
      ->with('category', $category)
      ->with('photoset', $photoset);
}));

//////////////////////////////////////////////////////////////////////
//////////////////////////// MAINTENANCE /////////////////////////////
//////////////////////////////////////////////////////////////////////

// Recompile local assets ------------------------------------------ /

Route::any('basset/compile', function() {
  Artisan::call('basset:compile', array(), new ViewOutput());

  return View::make('artisan')
    ->with('results', ViewOutput::getResults());
});
