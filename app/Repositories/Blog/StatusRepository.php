<?php

namespace NPDashboard\Repositories\Blog;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\Blog\Status;
use NPDashboard\Repositories\Repository;

class StatusRepository extends Repository
{
    private $lang;
    private $model;

    /**
     * StatusRepository constructor.
     * @param $lang
     */
    public function __construct($lang)
    {
        $this->lang = $lang;
        $this->model = $this->getModel();
    }

    /**
     * @return Status
     */
    public function getModel()
    {
        return (new Status());
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