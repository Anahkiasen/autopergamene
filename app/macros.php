<?php

/**
 * A blank link
 */
HTML::macro('linkBlank', function($url, $link = null, $attributes = array()) {
	$attributes['target'] = '_blank';

	return HTML::link($url, $link, $attributes);
});

/**
 * A link with the .back class
 */
HTML::macro('backLink', function($url, $text) {
	return HTML::link($url, $text, ['class' => 'back']);
});

/**
 * A link with the block link
 */
HTML::macro('blockLink', function($url, $text, $attributes = array()) {
	$attributes['class'] = 'block';

	return HTML::link($url, $text, $attributes);
});

/**
 * A link back home
 */
HTML::macro('homeLink', function() {
	return HTML::link('/'.Config::get('app.locale'), Lang::get('global.home'), ['class' => 'back']);
});

/**
 * Lazy loaded image
 */
HTML::macro('lazyLoad', function($image, $alt) {
	return HTML::image('http://placehold.it/350&text=Chargement...', $alt, array('data-original' => URL::asset($image)));
});
