<?php

// Raw data
$repositories = [
  ['Underscore.php',
    "Un port de la philosophie d'Underscore.js pour PHP, avec un ensemble d'outils dédié à la manipulation du texte, des arrays et des objets, là aussi avec une syntaxe élégante",
    'php, composer, laravel, toolkit', 'http://anahkiasen.github.com/underscore-php/'],
  ['Former',
    "Un bundle puissant de génération, population et validation de formulaires avec une syntaxe élégante",
    'php, laravel, forms', 'http://anahkiasen.github.com/former/'],
  ['Flatten',
    "Flatten est un bundle de cache pour le framework Laravel — il permet d'aplatir des pages complexes en de simples HTML à partir d'un identifiant unique généré à partir de l'environement dans lequel la page est vue",
    'php, laravel, cache', 'https://github.com/Anahkiasen/flatten'],
  ['Babel',
    "Un bundle d'aide au multilingue pour Laravel permettant de créer des phrases en plusieurs langues à partir de mots clés",
    'php, laravel, localization', 'https://github.com/Anahkiasen/babel'],
];

// Format data
$repositories = Arrays::each($repositories, function($repository) {
  return [
    'name'    => $repository[0],
    'content' => $repository[1],
    'tags'    => $repository[2],
    'link'    => $repository[3],
    'created_at' => new DateTime,
    'updated_at' => new DateTime,
  ];
});

return $repositories;
