<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////// VIEW COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('about', function($view) {
  $view->services = Service::all();

  // Get current time and timezone
  $timezone = new DateTimeZone('Europe/Paris');
  $today = ExpressiveDate::make(null, $timezone)->now();

  // Calculating dates
  $view->age = ExpressiveDate::make('March 2nd, 1990', $timezone)->getDifferenceInYears($today);
  $view->work = ExpressiveDate::make('October 1st, 2009', $timezone)->getDifferenceInYears($today);
});

View::composer('footer', function($view) {
  $view->services = Service::where('name', '!=', 'Mail')->where('name', '!=', 'YouTube')->get();
});

//////////////////////////////////////////////////////////////////////
/////////////////////////// PAGE COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('en-averse-dencre', function($view) {
  $view->articles = Article::latest()->get();
});

View::composer('the-winter-throat', function($view) {
  $view->tracks = Track::all();
});

View::composer('memorabilia', function($view) {
  $view->collections = Collection::with('photosets')->orderBy('id', 'desc')->get();
});

View::composer('les-fleurs-davril', function($view) {
  $view->stories = Story::latest()->get();
});

View::composer('graceful-degradation', function($view) {
  $view->repositories = Repository::orderBy('master', 'desc')->orderBy('order', 'asc')->get();
});

View::composer('today-is-sunday', function($view) {
  $view->tableaux = Tableau::latest()->get();
});

View::composer('illustration', function($view) {
  $view->supports = Support::with('thumbnail')->get();
});
