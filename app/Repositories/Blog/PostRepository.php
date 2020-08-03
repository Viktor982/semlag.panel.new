<?php

namespace NPDashboard\Repositories\Blog;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Blog\Post;

class PostRepository extends Repository
{
    private $lang;

    private $model;

    /**
     * PostRepository constructor.
     * @param $lang
     */
    public function __construct($lang)
    {
        $this->lang = $lang;
        $this->model = $this->getModel();
    }

    public function getModel()
    {
        return (new Post());
    }

    public function all()
    {
        return $this->model
            ->where('language_id', $this->lang)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function postsTable()
    {
        return $this->getModel()
            ->where('language_id', $this->lang)
            ->paginate(10);
    }

    public static function getStatusClass($status_id)
    {
        switch ($status_id) {
            case 1:
                return 'success';
            case 2:
                return 'warning';
            case 3:
                return 'default';
        }
    }

    public static function getStatusName($status_id)
    {
        switch ($status_id) {
            case 1:
                return 'Publicado';
            case 2:
                return 'Pendente de Revisão';
            case 3:
                return 'Rascunho';
        }
    }
}