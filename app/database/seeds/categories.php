<?php

// Raw data
$categories = [
  ['Memorabilia', 'Photographies', ''],
  ['Graceful Degradation', 'Projets et librairies web', ''],
  ['The Winter Throat', 'Compositions post-rock à influences diverses', ''],
  ['Les Fleurs d\'Avril', 'Recueil de nouvelles', ''],
  ['Le Soulèvement', 'Webcomic post-apocalpytique', 'http://the8day.info/OVAP/'],
  ['Today is Sunday', 'Tableaux surréalistes', ''],
  ['Illustration', 'Dessins et peinture digitale', ''],
  ['Le blog', 'Blog personnel', 'http://blogs.wefrag.com/Anahkiasen/'],
];

// Format data
return Arrays::each($categories, function($category) {
  list($name, $description, $link) = $category;

  return [
    'id'          => String::slugify($name),
    'name'        => $name,
    'description' => $description,
    'link'        => $link,
    'created_at'  => new DateTime,
    'updated_at'  => new DateTime,
  ];
});
