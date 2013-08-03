<?php

class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CategoriesSeeder');

		$this->call('SupportsSeeder');
		$this->call('IllustrationsSeeder');

		$this->call('PhotosetsSeeder');
		$this->call('CollectionsSeeder');
		$this->call('PhotosSeeder');

		$this->call('ArticlesSeeder');
		$this->call('RepositoriesSeeder');
		$this->call('ServicesSeeder');
		$this->call('StoriesSeeder');
		$this->call('TableauxSeeder');
		$this->call('TracksSeeder');
	}

}
