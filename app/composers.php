<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////// VIEW COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('about', function($view) {
  $view->social = DB::table('social')->get();

  // Get current time and timezone
  $timezone = new DateTimeZone('Europe/Paris');
  $today = ExpressiveDate::make(null, $timezone)->now();

  // Calculating dates
  $view->age = ExpressiveDate::make('March 2nd, 1990', $timezone)->getDifferenceInYears($today);
  $view->work = ExpressiveDate::make('October 1st, 2009', $timezone)->getDifferenceInYears($today);
});

//////////////////////////////////////////////////////////////////////
/////////////////////////// PAGE COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('categories.the-winter-throat', function($view) {
  $view->tracks = Track::all();
});

View::composer('categories.memorabilia', function($view) {
  $view->photosets = Photoset::latest();
});

View::composer('categories.les-fleurs-davril', function($view) {
  $view->stories = Story::latest();
});

View::composer('categories.graceful-degradation', function($view) {
  $view->repositories = DB::table('repositories')->orderBy('master', 'desc')->get();
});

View::composer('categories.today-is-sunday', function($view) {
  $view->tableaux = Tableau::latest();
});

View::composer('categories.illustration', function($view) {
  $view->supports = Support::with('thumbnail')->get();
});
