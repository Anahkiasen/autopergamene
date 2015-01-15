<?php
use Autopergamene\Entities\Models\Repository;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Packagist\Api\Client as Packagist;

/**
 * Seed the Github repositories
 */
class RepositoriesTableSeeder extends DatabaseSeeder
{
    /**
     * @type Packagist
     */
    protected $packagist;

    /**
     * @type array
     */
    protected $vendors = ['anahkiasen', 'rocketeers'];

    /**
     * Setup the migration
     */
    public function __construct()
    {
        $this->packagist = new Packagist();
    }

    /**
     * Run the migration
     */
    public function run()
    {
        $this->createRepositories('anahkiasen');
        $this->createRepositories('rocketeers');
    }

    /**
     * @param $packages
     */
    protected function createRepositories($packages)
    {
        $packages = $this->packagist->search($packages);

        foreach ($packages as $package) {
            $package = $this->packagist->get($package->getName());
            list ($vendor, $name) = explode('/', $package->getName());

            // Check if we already inserted it
            if (!in_array($vendor, $this->vendors) || Repository::whereName($package->getName())->first()) {
                continue;
            }

            // Get latest version and keywords
            $version  = $package->getVersions();
            $version  = $version[key($version)];
            $keywords = $version->getKeywords();

            Repository::create(array(
                'name'      => $package->getName(),
                'content'   => $package->getDescription(),
                'tags'      => $keywords,
                'vendor'    => $vendor,
                'package'   => $name,
                'downloads' => $package->getDownloads()->getTotal(),
            ));
        }
    }
}
