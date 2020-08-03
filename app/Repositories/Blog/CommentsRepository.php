<?php

namespace NPDashboard\Repositories\Blog;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\Blog\Comment;
use NPDashboard\Repositories\Repository;
use NpDashboard\Models\Customer;

class CommentsRepository extends Repository
{
    private $lang;
    private $model;

    const VISIBLE = 1;
    const INVISIBLE = 2;

    const REVIEWED = 1;
    const NOT_REVIEWED = 2;

    /**
     * CommentsRepository constructor.
     * @param $lang
     */
    public function __construct($lang)
    {
        $this->lang = $lang;
        $this->model = $this->getModel();
    }

    /**
     * @return Comment
     */
    public function getModel()
    {
        return (new Comment());
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->get();
    }

    /**
     * @return mixed
     */
    public function commentsTable()
    {
        return $this->model
            ->where('reviewed', self::NOT_REVIEWED)
            ->paginate(10);
    }
}