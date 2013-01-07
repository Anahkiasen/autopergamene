<?php

$categories = array(
  array('Memorabilia', 'Photographies', ''),
  array('Graceful Degradation', 'Projets et librairies web', ''),
  array('The Winter Throat', 'Compositions post-rock à influences diverses', ''),
  array('Les Fleurs d\'Avril', 'Recueil de nouvelles', ''),
  array('Le Soulèvement', 'Webcomic post-apocalpytique', 'http://the8day.info/OVAP/'),
  array('Today is Sunday', 'Tableaux surréalistes', ''),
  array('Illustration', 'Dessins et peinture digitale', ''),
  array('Le blog', 'Blog personnel', 'http://blogs.wefrag.com/Anahkiasen/'),
);

foreach ($categories as $key => $category) {
  $categories[$key] = array(
    'id'          => String::slugify($category[0]),
    'name'        => $category[0],
    'description' => $category[1],
    'link'        => $category[2],
    'created_at' => new DateTime,
    'updated_at' => new DateTime,
  );
}

return $categories;
