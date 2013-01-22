<?php

$supports = [
  ['digital', 'Peinture digitale'],
  ['drawings', 'Papier'],
  ['maya', 'Rendus 3D'],
  ['vector', 'Vectoriel'],
  ['video', 'Vidéo'],
];

return Arrays::each($supports, function($support) {
  list($slug, $name) = $support;

  return [
    'id'         => $slug,
    'name'       => $name,
    'created_at' => new DateTime,
    'updated_at' => new DateTime,
  ];
});
