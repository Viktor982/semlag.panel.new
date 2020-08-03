<?php


namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\Blog\TagsRepository;

class TagsController extends Controller
{
    public function getTag(TagsRepository $repository)
    {
        $args = $this->request->all();
        $tag = $repository->find($args['id']);

        return [
            'tag' => $tag
        ];
    }

}