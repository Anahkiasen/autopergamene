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
    return String::from(get_called_class())
      ->remove('Seeder')
      ->lower()
      ->obtain();
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

    // Print number of seeds
    $element = String::remove(get_called_class(), 'Seeder');
    //print sizeof($data).' '.lcfirst($element).' seeded successfully'.PHP_EOL;
  }
}
