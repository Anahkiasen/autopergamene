<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////// VIEW COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('about', function($event) {
  $event->view->social = DB::table('social')->get();

  // Get current time and timezone
  $timezone = new DateTimeZone('Europe/Paris');
  $today = ExpressiveDate::make(null, $timezone)->now();

  // Calculating dates
  $event->view->age = ExpressiveDate::make('March 2nd, 1990', $timezone)->getDifferenceInYears($today);
  $event->view->work = ExpressiveDate::make('October 1st, 2009', $timezone)->getDifferenceInYears($today);
});

View::composer('categories', function($event) {
  $event->view->categories = Category::orderBy('order', 'asc')->get();
});

//////////////////////////////////////////////////////////////////////
/////////////////////////// PAGE COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('categories.the-winter-throat', function($event) {
  $event->view->tracks = Track::all();
});

View::composer('categories.memorabilia', function($event) {
  $event->view->photosets = Photoset::latest();
});

View::composer('categories.les-fleurs-davril', function($event) {
  $event->view->novels = Novel::latest();
});

View::composer('categories.graceful-degradation', function($event) {
  $event->view->repositories = DB::table('repositories')->orderBy('master', 'desc')->get();
});

View::composer('categories.today-is-sunday', function($event) {
  $event->view->tableaux = Tableau::latest();
});

View::composer('categories.illustration', function($event) {
  $event->view->supports = Support::with(array('thumbnail' => function($query) {
    return $query->where('thumbnail', 1);
  }))->get();
});
