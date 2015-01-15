<?php
namespace Autopergamene\Controllers;

use Autopergamene\Entities\Repositories\CategoriesRepository;
use Autopergamene\Entities\Repositories\RepositoriesRepository;
use Controller;
use View;

class RepositoriesController extends Controller
{
    /**
     * The Category
     *
     * @type Category
     */
    protected $category;

    /**
     * The Repositories Repository

     *
*@type \Autopergamene\Entities\Repositories\RepositoriesRepository
     */
    protected $repositories;

    /**
     * Build a new SupportsController


*
*@param CategoriesRepository   $categories
     * @param \Autopergamene\Entities\Repositories\RepositoriesRepository $repositories
     */
    public function __construct(CategoriesRepository $categories, RepositoriesRepository $repositories)
    {
        $this->repositories = $repositories;
        $this->category     = $categories->getBySlug('graceful-degradation');
    }

    /**
     * Display all Repositories
     *
     * @return View
     */
    public function index()
    {
        return View::make('categories.repositories', array(
            'category'     => $this->category,
            'articles'     => $this->category->articles,
            'repositories' => $this->repositories->getOrderedRepositories(),
        ));
    }
}
