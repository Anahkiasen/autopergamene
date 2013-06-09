<?php

class CategoriesSeeder extends BaseSeed
{
  public function getSeeds()
  {
    return Arrays::each($this->getCategories(), function($category, $key) {
      list($name, $description, $link) = $category;

      return [
        'id'          => String::slugify($name),
        'name'        => $name,
        'description' => $description,
        'link'        => $link,
        'order'       => $key,
        'created_at'  => new DateTime,
        'updated_at'  => new DateTime,
      ];
    });
  }

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// CORE METHODS ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Raw categories
   *
   * @return array
   */
  public function getCategories()
  {
    return [
      ['Memorabilia', 'Photographies', ''],
      ['Graceful Degradation', 'Projets et librairies web', ''],
      ['The Winter Throat', 'Compositions post-rock à influences diverses', ''],
      ['Les Fleurs d\'Avril', 'Recueil de nouvelles', ''],
      ['Le Soulèvement', 'Webcomic post-apocalpytique', 'http://the8day.info/OVAP/'],
      ['Today is Sunday', 'Tableaux surréalistes', ''],
      ['Illustration', 'Dessins et peinture digitale', ''],
      ['En averse d\'encre', 'Divers articles', ''],
    ];
  }
}
