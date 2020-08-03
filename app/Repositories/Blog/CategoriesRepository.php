<?php

namespace NPDashboard\Repositories\Blog;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Blog\Category;

class CategoriesRepository extends Repository
{

    private $model;

    private $lang;

    /**
     * @return CategoriesRepository
     * @param $lang
     */
    public function __construct($lang = 1)
    {
        $this->lang = $lang;
        $this->model = $this->getModel();
    }

    /**
     * @return Category
     */
    public function getModel()
    {
        return (new Category());
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model
            ->where('language_id', $this->lang)
            ->get();
    }

    /**
     * @return mixed
     */
    public function categoriesTable()
    {
        return $this->model
            ->where('language_id', $this->lang)
            ->paginate(10);
    }
}