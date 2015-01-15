<?php
namespace Autopergamene\Controllers;

use Autopergamene\Models\Category;
use Autopergamene\Repositories\CategoriesRepository;
use Controller;
use View;

/**
 * Dispatches to various Category places
 */
class CategoriesController extends Controller
{
    /**
     * The Category Repository
     *
     * @type CategoriesRepository
     */
    protected $repository;

    /**
     * Bind dependencies
     *
     * @param CategoriesRepository $categories
     */
    public function __construct(CategoriesRepository $categories)
    {
        $this->repository = $categories;
    }

    /**
     * Display all categories
     *
     * @return View
     */
    public function index()
    {
        return View::make('home', array(
            'categories' => $this->repository->getOrdered(),
        ));
    }

    /**
     * Displays a Category
     *
     * @param Category $category
     *
     * @return View
     */
    public function show(Category $category)
    {
        return View::make('categories.'.$category->id, array(
            'category' => $category,
            'articles' => $category->articles,
        ));
    }
}
