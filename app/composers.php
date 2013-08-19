<?php
use Autopergamene\Repository;
use Autopergamene\Service;
use Autopergamene\Tableau;
use Autopergamene\Track;

//////////////////////////////////////////////////////////////////////
/////////////////////////// VIEW COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('partials.about', function($view) {
	$view->services = Service::all();

	// Get current time and timezone
	$today = Carbon::now('Europe/Paris');

	// Calculating dates
	$view->age  = Carbon::createFromDate(1990, 3, 2)->diffInYears($today);
	$view->work = ceil(Carbon::createFromDate(2009, 10, 1)->diffInMonths($today) / 12);
});

View::composer('layouts.partials.footer', function($view) {
	$view->services = Service::whereNotIn('name', ['Mail', 'Youtube'])->get();
});

//////////////////////////////////////////////////////////////////////
/////////////////////////// PAGE COMPOSERS ///////////////////////////
//////////////////////////////////////////////////////////////////////

View::composer('categories.the-winter-throat', function($view) {
	$view->tracks = Track::orderBy('plays', 'desc')->get();
});

View::composer('categories.graceful-degradation', function($view) {
	$view->repositories = Repository::orderBy('master', 'desc')->orderBy('order')->get();
});

View::composer('categories.today-is-sunday', function($view) {
	$view->tableaux = Tableau::latest()->get();
});
