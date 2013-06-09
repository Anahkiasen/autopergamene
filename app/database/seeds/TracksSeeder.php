<?php

class TracksSeeder extends BaseSeed
{
  public function getSeeds()
  {
    return Arrays::each($this->getTracks(), function($track) {
      list($name, $id, $movements) = $track;

      return [
        'name'       => $name,
        'soundcloud' => $id,
        'movements'  => $movements,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ];
    });
  }

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// CORE METHODS ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  protected function getTracks()
  {
    return [
      ['Down Wonderlands', '11002144',
        "00:00 - 01:25 : J'ai rêvé du brasier de son sourire (I dreamt of the fire of her smile)
         01:25 - 04:35 : Caesura – du néant vers l'horizon (Caesura – from the void to the horizon)
         04:35 - 09:30 : Turbulences et fragments sur les autoroutes d'un souvenir (Disruptions and fragments, on the highway of a memory)
         09:30 - 13:20 : Des traces de pas sous une bruine de sève (Footprints under a rain of sap)
         13:20 - 15:20 : Thème à l'insomnie sur mélodie de bruit blanc (Insomnia theme over white noise melody)"],

      ['Prussian Black', '7195146',
        "00:00 - 01:08 : Nuits troublées (Troubled nights)
         01:08 - 04:08 : Une aube dans la gorge des vagues (A dawn in the waves throat)
         04:08 - 05:14 : La noyade - (The drowning)
         05:14 - 07:50 : Ma soeur les abysses (My sister the abyss)
         07:50 - 09:35 : Une goutte de sueur dans une mer de nuit (A drop of sweat in a sea of night)"],

      ['Bonefire', '6431808',
        "00:00 - 02:15 : Les aquarelles de flamme (The fire watercolors)
         02:15 - 04:30 : Retombée (Fell out)
         04:30 - 06:33 : Drapée de cendres (Wrapped with ashes)"],
    ];
  }
}
