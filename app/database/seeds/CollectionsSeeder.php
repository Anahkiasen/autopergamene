<?php

class CollectionsSeeder extends BaseSeed
{
  public function getSeeds()
  {
    $collections = Flickering::collectionsGetTree(0, '31667913@N06')->getResults('collection');

    return Arrays::each($collections, function($collection) {

      // Bind collections
      foreach ($collection['set'] as $photoset) {
        DB::table('collection_photoset')->insert(array(
          'collection_id' => $collection['id'],
          'photoset_id'   => $photoset['id'],
          'created_at'    => new DateTime,
          'updated_at'    => new DateTime,
        ));
      }

      return [
        'id'          => $collection['id'],
        'name'        => $collection['title'],
        'description' => $collection['description'],
        'created_at'  => new DateTime,
        'updated_at'  => new DateTime,
      ];
    });
  }
}
