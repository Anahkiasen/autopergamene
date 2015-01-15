<?php
namespace Autopergamene\Entities\Repositories;

use Arrounded\Abstracts\AbstractRepository;
use Autopergamene\Entities\Models\Category;
use Autopergamene\Repositories\Collection;

/**
 * Fetches Categories from the database
 */
class CategoriesRepository extends AbstractRepository
{
    /**
     * @param Category $items
     */
    public function __construct(Category $items)
    {
        $this->items = $items;
    }

    /**
     * Get all categories in a predefined order
     *
     * @return Collection
     */
    public function getOrdered()
    {
        return $this->items->withLang()->orderBy('order')->get();
    }

    /**
     * Get a Category by its slug
     *
     * @param string $slug The slug
     *
     * @return Category
     */
    public function getBySlug($slug)
    {
        return $this->items->findOrFail($slug);
    }
}
