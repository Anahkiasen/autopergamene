<?php
use Autopergamene\Category;

class CategoriesSeeder extends BaseSeed
{
  public function run()
  {
    $categoriesNames = ['Memorabilia', 'Graceful Degradation', 'The Winter Throat', 'Les Fleurs d\'Avril', 'Le Soulèvement', 'Today is Sunday', 'Illustration', 'En averse d\'encre'];
    foreach ($categoriesNames as $key => $name) {
      $link = ($name == 'Le Soulèvement')
        ? 'http://the8day.info/OVAP'
        : null;

      Category::create([
        'id'          => Str::slug($name),
        'name'        => $name,
        'link'        => $link,
        'order'       => $key,
      ]);
    }

    foreach ($this->getTranslations() as $lang => $categories) {
      foreach ($categories as $key => $description) {
        Category::whereId(Str::slug($categoriesNames[$key]))->first()->fill([
          'description' => $description,
          'lang'        => $lang,
        ])->save();
      }
    }
  }

  ////////////////////////////////////////////////////////////////////
  /////////////////////////// CORE METHODS ///////////////////////////
  ////////////////////////////////////////////////////////////////////

  /**
   * Raw categories
   *
   * @return array
   */
  public function getTranslations()
  {
    return [
      'fr' => [
        'Photographies',
        'Projets et librairies web',
        'Compositions post-rock à influences diverses',
        'Recueil de nouvelles',
        'Webcomic post-apocalpytique',
        'Tableaux surréalistes',
        'Dessins et peinture digitale',
        'Divers articles',
      ],
      'en' => [
        'Photographies',
        'Web projects and libraries',
        'Post-rock pieces of various influences',
        'Short stories',
        'Post-apocalyptic webcomic',
        'Surrealist tableaux',
        'Drawings and digital painting',
        'Various articles',
      ]
    ];
  }
}
