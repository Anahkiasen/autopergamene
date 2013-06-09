<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////// VIEW COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('about', function($view) {
  $view->services = Service::all();

  // Get current time and timezone
  $today = Carbon::now('Europe/Paris');

  // Calculating dates
  $view->age  = Carbon::createFromDate(1990, 3, 2)->diffInYears($today);
  $view->work = Carbon::createFromDate(2009, 10, 1)->diffInYears($today);
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
  $view->tracks = Track::orderBy('plays', 'desc')->get();
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
