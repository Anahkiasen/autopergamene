<?php
class RepositoriesSeeder extends BaseSeed
{
  public function getSeeds()
  {
    return Arrays::each($this->getRepositories(), function($repository, $order) {
      list($name, $content, $tags, $vendor, $package, $master) = $repository;

      return [
        'name'       => $name,
        'content'    => $content,
        'tags'       => $tags,
        'vendor'     => $vendor,
        'package'    => $package,
        'order'      => $order,
        'master'     => $master,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ];
    });
  }

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// CORE METHODS ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  protected function getRepositories()
  {
    return [
      ['Underscore.php',
        "Un port de la philosophie d'Underscore.js pour PHP, avec un ensemble d'outils dédié à la manipulation du texte, des arrays et des objets, là aussi avec une syntaxe élégante",
        'php, composer, laravel, toolkit', 'Anahkiasen', 'underscore-php', true],
      ['Former',
        "Une bibliothèque puissante de génération, population et validation de formulaires avec une syntaxe élégante",
        'php, laravel, forms', 'Anahkiasen', 'former', true],
      ['Flickering',
        "Une interface élégante et moderne à l'API du site de partage de photos Flickr",
        'php, flickr, api, rest', 'Anahkiasen', 'flickering', true],
      ['HTMLObject',
        "Un package minimaliste permettant de créer facilement des classes étant des représentations abstraites d'éléments HTML, et de les manipuler.",
        'php, html', 'Anahkiasen', 'html-object', true],
      ['Flatten',
        "Flatten est une bibliothèque de cache pour le framework Laravel — il permet d'aplatir des pages complexes en de simples HTML à partir d'un identifiant unique généré à partir de l’environnement dans lequel la page est vue",
        'php, laravel, cache', 'Anahkiasen', 'flatten', true],
      ['Babel',
        "Un package d'aide au multilingue pour Laravel permettant de créer des phrases en plusieurs langues à partir de mots clés",
        'php, laravel, localization', 'Anahkiasen', 'babel', true],

      ['Bootstrapper',
        "Ensembles de classes statiques aidant à la génération de markup pour le célèbre framework Twitter Bootstrap",
        'php, css framework, twitter bootstrap', 'patricktalmadge', 'bootstrapper', false],
      ['Mongovel',
        "Un wrapper pour Laravel autour du driver PHP de MongoDB pour rendre ce dernier plus similaire à Eloquent",
        'php, laravel, mongodb', 'juien-c', 'mongovel', false],
      ['Menu',
        "Une bibliothèque pour gérer et générer des menus, des plus simples aux plus complexes",
        'php, menu', 'Vespakoen', 'laravel-menu', false],
    ];
  }
}