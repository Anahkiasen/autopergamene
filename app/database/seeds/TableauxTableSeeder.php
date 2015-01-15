<?php
use Autopergamene\Models\Tableau;

class TableauxTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        foreach ($this->getTableaux() as $tableau) {
            list($name, $date) = $tableau;

            Tableau::create(array(
                'name'       => $name,
                'created_at' => DateTime::createFromFormat('Y-m-d', $date),
                'updated_at' => DateTime::createFromFormat('Y-m-d', $date),
            ));
        }
    }

    ////////////////////////////////////////////////////////////////////
    /////////////////////////// CORE METHODS ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    protected function getTableaux()
    {
        return [
            ['Arkansas', '2007-04-01'],
            ['Attendez', '2007-04-16'],
            ['Au Mauvais Endroit', '2007-03-11'],
            ['Aux Yeux d\'un Ange', '2007-01-02'],
            ['Bain de Minuit', '2007-07-28'],
            ['C\'est Dimanche Aujourd\'hui', '2007-03-12'],
            ['Changer de Chaînes', '2007-08-08'],
            ['Double Jeu', '2007-07-26'],
            ['Décalage Horaire', '2007-08-31'],
            ['Gorge Profonde', '2008-01-16'],
            ['Hiroshima', '2008-01-15'],
            ['Inhale', '2007-01-03'],
            ['Jardin Secret', '2007-01-06'],
            ['Jeux de guerre', '2008-01-19'],
            ['Le Démon de Dover', '2008-01-15'],
            ['Le Monstre du Lundi Matin', '2007-01-05'],
            ['Les Jardins Suspendus', '2008-08-31'],
            ['Les Nuits d\'Orage', '2007-04-14'],
            ['Les Poupées Russes', '2008-03-25'],
            ['Les Roses sont Rouges', '2007-03-28'],
            ['Leviathan', '2008-03-19'],
            ['Meet the Engineer', '2009-05-08'],
            ['Meet the Sniper', '2009-06-06'],
            ['Minuit Quatre', '2008-01-20'],
            ['Neftekumsk', '2007-07-27'],
            ['Nuit et brouillard', '2008-01-20'],
            ['Ombres Chinoises', '2007-07-28'],
            ['Pour la prunelle de ses yeux', '2007-01-03'],
            ['Prometheus', '2008-01-13'],
            ['Six Pieds Sous Terre', '2008-08-31'],
            ['Séquestration', '2008-08-28'],
            ['Today Was a Good Day', '2007-01-03'],
            ['Train de vie', '2007-01-03'],
            ['Un train de retard', '2007-03-29'],
            ['Vertigo', '2008-01-13'],
            ['Vue sur L\'Amer', '2007-05-08'],
            ['We used to vacation', '2008-09-01'],
            ['À la poursuite de l\'aurore', '2008-04-07'],
            ['Épuration', '2008-03-29'],
        ];
    }
}
