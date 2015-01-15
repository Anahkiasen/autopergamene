<?php
use Autopergamene\Models\Repository;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Packagist\Api\Client as Packagist;

/**
 * Seed the Github repositories
 */
class RepositoriesTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        $packagist = new Packagist();

        foreach ($this->getRepositories() as $order => $repository) {
            list($name, $content, $vendor, $package) = $repository;

            // Get Packagist informations
            try {
                $version  = $packagist->get($vendor.'/'.$package)->getVersions();
                $version  = $version[key($version)];
                $keywords = $version->getKeywords();
            } catch (ClientErrorResponseException $e) {
                $keywords = array();
            }

            Repository::create(array(
                'name'    => $name,
                'content' => $content,
                'tags'    => $keywords,
                'vendor'  => $vendor,
                'package' => $package,
                'order'   => $order,
                'master'  => $vendor == 'Anahkiasen',
            ));
        }
    }

    ////////////////////////////////////////////////////////////////////
    /////////////////////////// CORE METHODS ///////////////////////////
    ////////////////////////////////////////////////////////////////////

    /**
     * Get the repositories' meta data
     *
     * @return array
     */
    protected function getRepositories()
    {
        return [
            [
                'Former',
                "Une bibliothèque puissante de génération, population et validation de formulaires avec une syntaxe élégante",
                'Anahkiasen',
                'former',
            ],
            [
                'Rocketeer',
                "Un package de déploiement pour PHP avec gestion des rollbacks, fichiers partagés, tasks personelles, etc",
                'Anahkiasen',
                'rocketeer',
            ],
            [
                'Underscore.php',
                "Un port de la philosophie d'Underscore.js pour php, avec un ensemble d'outils dédié à la manipulation du texte, des arrays et des objets, là aussi avec une syntaxe élégante",
                'Anahkiasen',
                'underscore-php',
            ],
            [
                'Flatten',
                "Flatten est une bibliothèque de cache pour le framework Laravel — il permet d'aplatir des pages complexes en de simples HTML à partir d'un identifiant unique généré à partir de l’environnement dans lequel la page est vue",
                'Anahkiasen',
                'flatten',
            ],
            [
                'HTMLObject',
                "Un package minimaliste permettant de créer facilement des classes étant des représentations abstraites d'éléments HTML, et de les manipuler.",
                'Anahkiasen',
                'html-object',
            ],
            [
                'Flickering',
                "Une interface élégante et moderne à l'API du site de partage de photos Flickr",
                'Anahkiasen',
                'flickering',
            ],
            [
                'Polyglot',
                "Un package d'aide à la localization d'applications",
                'Anahkiasen',
                'polyglot',
            ],
            [
                'Babel',
                "Un package d'aide au multilingue pour Laravel permettant de créer des phrases en plusieurs langues à partir de mots clés",
                'Anahkiasen',
                'babel',
            ],
            [
                'Bootstrapper',
                "Ensembles de classes statiques aidant à la génération de markup pour le célèbre framework Twitter Bootstrap",
                'patricktalmadge',
                'bootstrapper',
            ],
            [
                'Mongovel',
                "Un wrapper pour Laravel autour du driver php de MongoDB pour rendre ce dernier plus similaire à Eloquent",
                'julien-c',
                'mongovel',
            ],
            [
                'Menu',
                "Une bibliothèque pour gérer et générer des menus, des plus simples aux plus complexes",
                'Vespakoen',
                'laravel-menu',
            ],
        ];
    }
}
