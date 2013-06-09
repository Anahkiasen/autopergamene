<?php

class StoriesSeeder extends BaseSeed
{
  public function getSeeds()
  {
    return Arrays::each($this->getStories(), function($story) {
      list($name, $date, $summary) = $story;

      return [
        'id'          => String::slugify($name),
        'name'        => $name,
        'description' => $summary,
        'image'       => String::slugify($name).'.jpg',
        'created_at'  => DateTime::createFromFormat('Y-m-d', $date),
        'updated_at'  => DateTime::createFromFormat('Y-m-d', $date),
      ];
    });
  }

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// CORE METHODS ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  protected function getStories()
  {
    return [
      ["Les fleurs d'avril", "2007-11-02",
        "Anonyme était son nom, était son prénom. Juste un inconnu assis dans son salon, à contempler les crépitements du feu qui s’agitait dans l’âtre et faisait danser les ombres de la pièce sombre. À travers la fenêtre ne s’apercevaient que les évanescentes silhouettes des immeubles dans la nuit, perdues dans cette petite ville qu’un lourd orage avait enténébrée de ses grands voiles de nuages noirs.
        Tel un tapis malveillant dans le ciel ne laissant filtrer que quelques jets de foudre, pareils à de brèves lueurs dans la pénombre ; élançant dans l’océan ébène d’obscurité, quelques vifs éclairs qui serpentaient le ciel et guidaient les démons de minuit à travers le morne dédale des immeubles."],
      ["À l'Ombre ; d'un Chêne", "2008-03-12",
        "Le trou fut rebouché comme on clorait les mémoires des personnes présentes, et après s’être saluées, celles-ci s’écartèrent en silence vers des horizons moins fades. Cette frêle femme défunte fut abandonnée, dans sa tombe à l’ombre ; d’un chêne chutèrent quelques feuilles sur un discret chuintement, de lourdes larmes tombées de maigres branches, tels les pleurs aux couleurs monotones, des arbres en automne."],
      ["Bruine de sève", "2008-05-04",
        "Ce sont ces heures que redoute la lumière dans sa fuite effrénée, lorsque le jour expire et se meurt par-delà les collines des paysages isolés. Ces contrées esseulées où les arbres se dressent en remparts, telles de féroces forteresses contre les pires des cauchemars. Un mur face à ces pluies de sang qui s’abattront jusqu’à ce que l’humanité s’achève ; jusqu’à ce que s’arrache la dernière once d’écorce, et qu’enfin bruine la sève."],
      ["Le Huitième Jour", "2007-07-18",
        "Noires ; comme si le néant avait fait halte en bas de chez-elle. De rares badauds étaient pourtant là, venus voir pourquoi tous les lampadaires de leur petite rue avaient claqué au même moment – et ne trouvant sans doute aucune réponse. Les gens parlaient, mais ne se voyaient pas ; restaient stoïques à regarder les lampadaires, pupilles ouvertes en grand, mains sur taille. Les yeux écarquillés pour tenter d’apercevoir quelque chose, en vain.
          Quand les lampadaires en chœur se rallumèrent – séparèrent les ténèbres de leur brusque lumière – tous braquèrent leurs bras par-dessus leurs yeux brûlés, l’espace d’un instant éphémère.
          Et la rue reprit peu à peu ses teintes naturelles, éclairées d’une lumière qui semblait nouvelle.

          Il y eut un soir, il y eut un matin.
          Premier jour."],
      ["Théâtre nocturne", "2007-12-29",
        "Trois sons graves sonnèrent, tels les vulgaires applaudissements d’un bruyant tonnerre.
        Juste trois coups grondants, l’air de dire, « que le spectacle commence »."],
      ["Soleil pleurant", "2007-07-15",
        "Coupés sèchement comme une gorge à vif, les cris se turent, et le silence revint s’asseoir à sa place.
        <em>J’ai raté quelque chose ?</em>

        Une silhouette s’écarta de la ruelle pour pénétrer lentement dans la plénitude de la nuit.
        Laissant le point noir redescendre, la situation reprendre sens ; du cadavre à terre, ruisseler le sang."],
      ["Pour la prunelle de ses yeux", "2006-05-15",
        "Puis enfin, la jeune fille rouvrit ses si beaux yeux : blancs immaculés, mais pourtant si sombres ; reflétant l’homme reculant avec angoisse en secouant la tête. Il élança instantanément sa main vers le fusil, doigt sur la gâchette. Se demandant pourquoi diable était-ce si dur de tirer sur elle ?"],
      ["Troubles visages monochromes", "2010-07-23",
        "« Maintenant ferme les yeux et n’y pense plus »
           D’un revers de rayon le soleil projeta la vaste ombre d’un arbre sur eux ; et leurs silhouettes comme évanouies dans le trouble des blés, ils s’embrassèrent sous le brasier d’un ciel d’où dans la quiétude s’élevait, l’aube enfin."],
    ];
  }
}
