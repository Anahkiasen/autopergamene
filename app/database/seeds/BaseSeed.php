<?php

class BaseSeed extends Seeder
{
	/**
	 * Run the Seeder
	 */
	public function run()
	{
		$data = $this->getSeeds();
		$data = array_values($data);

		$this->seed($data);
	}

	/**
	 * Get the name of the matching Model
	 *
	 * @return string
	 */
	protected function getTableName()
	{
		$string = String::remove(get_called_class(), 'Seeder');
		$string = String::lower($string);

		return $string;
	}

	/**
	 * Insert data into the database
	 *
	 * @param array $data Data
	 */
	protected function seed($data)
	{
		$table = $this->getTableName();

		// Slice for SQLite
		$slicer = floor(999 / sizeof($data[0]));
		$slices = array_chunk($data, $slicer);
		foreach ($slices as $slice) {
			DB::table($table)->insert($slice);
		}
	}
}
