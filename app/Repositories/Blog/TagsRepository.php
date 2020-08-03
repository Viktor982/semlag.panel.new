<?php

namespace NPDashboard\Repositories\Blog;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Blog\Tag;

class TagsRepository extends Repository
{
    private $lang;
    private $model;

    /**
     * TagsRepository constructor.
     * @param $lang
     */
    public function __construct($lang = 1)
    {
        $this->lang = $lang;
        $this->model = $this->getModel();
    }

    /**
     * @return Tag
     */
    public function getModel()
    {
        return (new Tag());
    }

    /**
     * @return mixed
     */
    public function tagsTable()
    {
        return $this->model
            ->where('language_id', $this->lang)
            ->paginate(10);
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
}
