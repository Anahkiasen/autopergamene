<?php

/**
 * A link with the .back class
 */
HTML::macro('backLink', function($url, $text) {
  return HTML::to($url, $text, array('class' => 'back'));
});

/**
 * A link with the block link
 */
HTML::macro('blockLink', function($url, $text) {
  return HTML::to($url, $text, array('class' => 'block'));
});

/**
 * A link back home
 */
HTML::macro('homeLink', function() {
  return HTML::toHome("Retour à l'accueil", array('class' => 'back'));
});