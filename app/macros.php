<?php

/**
 * A link with the .back class
 */
HTML::macro('backLink', function($url, $text) {
  return HTML::link($url, $text, array('class' => 'back'));
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
  return HTML::linkHome("Retour à l'accueil", array('class' => 'back'));
});

/**
 * Lazy loaded image
 */
HTML::macro('lazyLoad', function($image, $alt) {
  return HTML::image('http://placehold.it/350&text=Chargement...', $alt, array('data-original' => URL::asset($image)));
});
