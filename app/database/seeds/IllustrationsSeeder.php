<?php
use Autopergamene\Illustration\Illustration;

class IllustrationsSeeder extends Seeder
{
	public function run()
	{
		foreach ($this->getIllustrations() as $illustration) {
			list ($name, $description, $category) = $illustration;

			Illustration::create([
				'name'       => $name,
				'media'      => $description,
				'image'      => Str::slug($name).'.jpg',
				'thumbnail'  => (bool) isset($illustration[3]),
				'support_id' => $category,
			]);
		}
	}

	////////////////////////////////////////////////////////////////////
	/////////////////////////// CORE METHODS ///////////////////////////
	////////////////////////////////////////////////////////////////////

	/**
	 * Get the Illustrations to insert
	 *
	 * @return array
	 */
	protected function getIllustrations()
	{
		return [

			// Digital
			['The Big Flush', 'Fond d\'écran pour Le Soulèvement', 'digital'],
			['Red', 'Série Red', 'digital', true],
			['Red II', 'Série Red', 'digital'],
			['L\'Hydre', 'Recherches pour Le Soulèvement', 'digital'],
			['La murène', 'Recherches pour Le Soulèvement', 'digital'],
			['Memorabilia', 'Montage à partir de photos personelles', 'digital'],
			['Drosera', 'Recherches pour Le Soulèvement', 'digital'],
			['L\'épouventail', 'Recherches pour Le Soulèvement', 'digital'],
			['Mother', 'Recherches pour Le Soulèvement', 'digital'],
			['Vampire', 'Recherches pour Le Soulèvement', 'digital'],
			['Coloration', 'Recoloration d\'une peinture', 'digital'],
			['Guitare', '', 'digital'],
			['Hiver', '', 'digital'],

			// Drawings
			['Chair', 'Feutre, eau et Posca blanc', 'drawings', true],
			['Tree People', 'Fusain et encre de chine', 'drawings'],
			['Ancient Mariner', 'Fusain et encre de chine', 'drawings'],
			['Django Reinhardt', 'Fusain', 'drawings'],
			['Le cavalier', 'Fusain et encre de chine', 'drawings'],
			['Nu', 'Fusain', 'drawings'],
			['Lily', 'Aquarelle', 'drawings'],
			['Rose', 'Aquarelle', 'drawings'],
			['Reproduction', 'Crayon à papier (à partir d\'une gravure)', 'drawings'],
			['Autoportrait', 'Crayon à papier', 'drawings'],
			['Bougeoir', 'Encre de chine', 'drawings'],
			['Beksinski', 'Crayon à papier', 'drawings'],
			['Wanderer', 'Crayon à papier', 'drawings'],

			// Rendus 3D
			['Les rues', '', 'maya', true],
			['Vaisseau', '', 'maya'],

			// Vidéo
			['Christ Send Light', 'Encre et peinture<br>Musique montage à partir de Nadja - Christ Send Light', 'video', true],

		];
	}
}
