<?php
use Underscore\Types\String;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    $this->call('CategoriesSeeder');

    $this->call('SupportsSeeder');
    $this->call('IllustrationsSeeder');

    $this->call('PhotosetsSeeder');
    $this->call('PhotosSeeder');

    $this->call('ArticlesSeeder');
    $this->call('RepositoriesSeeder');
    $this->call('SocialSeeder');
    $this->call('StoriesSeeder');
    $this->call('TableauxSeeder');
    $this->call('TracksSeeder');
	}

}