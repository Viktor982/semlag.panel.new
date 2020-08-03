<?php


namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\Blog\CategoriesRepository;

class CategoriesController extends Controller
{
    /**
     * @param CategoriesRepository $repository
     * @return array
     */
    public function getCategory(CategoriesRepository $repository)
    {
        $args = $this->request->all();
        $category = $repository->find($args['id']);

        return [
            'category' => $category
        ];
    }
}