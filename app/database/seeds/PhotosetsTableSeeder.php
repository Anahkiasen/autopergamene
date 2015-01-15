<?php
use Autopergamene\Models\Photography\Photoset;

/**
 * Seed the Photos from Flickr
 */
class PhotosetsTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        $photosets = Flickering::photosetsGetList('31667913@N06')->getResults('photoset');

        foreach ($photosets as $photoset) {
            Photoset::create([
                'id'         => $photoset['id'],
                'name'       => $photoset['title']['_content'],
                'slug'       => Str::slug($photoset['title']['_content']),
                'created_at' => Carbon::createFromTimestamp($photoset['date_create']),
                'updated_at' => Carbon::createFromTimestamp($photoset['date_update']),
            ]);
        }
    }
}
