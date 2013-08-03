<?php

class SupportsSeeder extends BaseSeed
{
	public function getSeeds()
	{
		return Arrays::each($this->getSupports(), function($support) {
			list($slug, $name) = $support;

			return [
				'id'         => $slug,
				'name'       => $name,
				'created_at' => new DateTime,
				'updated_at' => new DateTime,
			];
		});
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
