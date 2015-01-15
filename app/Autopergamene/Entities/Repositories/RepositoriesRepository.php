<?php
namespace Autopergamene\Entities\Repositories;

use Arrounded\Abstracts\AbstractRepository;
use Autopergamene\Entities\Models\Repository;

class RepositoriesRepository extends AbstractRepository
{
    /**
     * @param Repository $items
     */
    public function __construct(Repository $items)
    {
        $this->items = $items;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getOrderedRepositories()
    {
        return $this->items()->orderBy('downloads', 'DESC')->get();
    }
}
