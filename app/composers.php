<?php

//////////////////////////////////////////////////////////////////////
/////////////////////////// VIEW COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('about', function($view) {
  $view->social = DB::table('social')->get();

  // Calculating dates
  $timezone = new DateTimeZone('Europe/Paris');

  $today = ExpressiveDate::make(null, $timezone)->now();
  $view->age = ExpressiveDate::make('March 2nd, 1990', $timezone)->getDifferenceInYears($today);
  $view->work = ExpressiveDate::make('October 1st, 2009', $timezone)->getDifferenceInYears($today);
});
