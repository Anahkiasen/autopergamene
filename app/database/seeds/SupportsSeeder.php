<?php
use Autopergamene\Illustration\Support;

/**
 * Seed Illustrations Supports
 */
class SupportsSeeder extends Seeder
{
	public function run()
	{
		foreach ($this->getSupports() as $support) {
			Support::create(array(
				'id'   => $support[0],
				'name' => $support[1],
			));
		}
	}

	////////////////////////////////////////////////////////////////////
	/////////////////////////// CORE METHODS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	protected function getSupports()
	{
		return [
			['digital', 'Peinture digitale'],
			['drawings', 'Papier'],
			['maya', 'Rendus 3D'],
			['vector', 'Vectoriel'],
			['video', 'Vidéo'],
		];
	}
}
