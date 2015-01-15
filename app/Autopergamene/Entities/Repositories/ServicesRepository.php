<?php
namespace Autopergamene\Entities\Repositories;

use Arrounded\Abstracts\AbstractRepository;
use Autopergamene\Entities\Models\Service;

class ServicesRepository extends AbstractRepository
{
    /**
     * @param Service $items
     */
    public function __construct(Service $items)
    {
        $this->items = $items;
    }

    /**
     * Get Services for the footer
     *
     * @return \Illuminate\Support\Collection
     */
    public function getFooterServices()
    {
        return $this->items()->whereNotIn('name', ['Mail', 'Youtube'])->get();
    }
}
