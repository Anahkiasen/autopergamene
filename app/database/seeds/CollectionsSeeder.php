<?php
use Autopergamene\Photography\Collection;

class CollectionsSeeder extends Seeder
{
	public function run()
	{
		$collections = Flickering::collectionsGetTree(0, '31667913@N06')->getResults('collection');
		foreach ($collections as $collection) {
			$sets = array_pluck($collection['set'], 'id');
			$id   = $collection['id'];

			$collection = Collection::create(array(
				'id'          => $id,
				'name'        => $collection['title'],
				'description' => $collection['description'],
			));

			foreach ($sets as $set) {
				$collection->photosets()->attach($set, ['collection_id' => $id]);
			}
		}
	}
}
