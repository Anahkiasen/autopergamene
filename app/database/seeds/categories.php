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
  return [
    'id'          => String::slugify($category[0]),
    'name'        => $category[0],
    'description' => $category[1],
    'link'        => $category[2],
    'created_at'  => new DateTime,
    'updated_at'  => new DateTime,
  ];
});
