<?php
use Arrounded\Seeders\AbstractSeeder;

class DatabaseSeeder extends AbstractSeeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->seed('Categories');

		// Illustration
		$this->seed('Supports');
		$this->seed('Illustrations');

		// Photography
		$this->seed('Photosets');
		$this->seed('Collections');
		$this->seed('Photos');

		$this->seed('Articles');
		$this->seed('Repositories');
		$this->seed('Services');
		$this->seed('Stories');
		$this->seed('Tableaux');
		$this->seed('Tracks');
	}
}
