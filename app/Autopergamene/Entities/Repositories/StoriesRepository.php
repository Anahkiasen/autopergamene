<?php
namespace Autopergamene\Entities\Repositories;

use Arrounded\Abstracts\AbstractRepository;
use Autopergamene\Entities\Models\Story;

class StoriesRepository extends AbstractRepository
{
    /**
     * @param Story $items
     */
    public function __construct(Story $items)
    {
        $this->items = $items;
    }

    /**
     * Get the stories by latest first
     *
     * @return \Illuminate\Support\Collection
     */
    public function getLatest()
    {
        return $this->items()->latest()->get();
    }
}
