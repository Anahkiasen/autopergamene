<?php
namespace Autopergamene\Entities\Repositories;

use Arrounded\Abstracts\AbstractRepository;
use Autopergamene\Entities\Models\Illustration\Support;

class SupportsRepository extends AbstractRepository
{
    /**
     * @param Support $items
     */
    public function __construct(Support $items)
    {
        $this->items = $items;
    }
}
