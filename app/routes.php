<?php

//////////////////////////////////////////////////////////////////////
////////////////////////////// NAMESPACES ////////////////////////////
//////////////////////////////////////////////////////////////////////

View::addLocation(__DIR__.'/views/layouts');
View::addLocation(__DIR__.'/views/partials');

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
