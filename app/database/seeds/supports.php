<?php

$supports = [
  ['digital', 'Peinture digitale'],
  ['drawings', 'Papier'],
  ['maya', 'Rendus 3D'],
  ['vector', 'Vectoriel'],
  ['video', 'Vidéo'],
];

return Arrays::each($supports, function($support) {
  return [
    'id'         => $support[0],
    'name'       => $support[1],
    'created_at' => new DateTime,
    'updated_at' => new DateTime,
  ];
});
