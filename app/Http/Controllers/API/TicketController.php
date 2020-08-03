<?php


namespace NPDashboard\Http\Controllers\API;


use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\TicketCategoriesRepository;
use NPDashboard\Repositories\TicketTopicsRepository;

class TicketController extends Controller
{
    /**
     * @param TicketCategoriesRepository $repository
     * @return array
     */
    public function getCategories(TicketCategoriesRepository $repository)
    {
        $id = $this->request->all()['id'];
        $ticket = $repository->find($id);
        return [
            'id' => $ticket->id,
            'br' => $ticket->translations->where('language_id', 1)->first()->name,
            'en' => $ticket->translations->where('language_id', 2)->first()->name,
            'es' => $ticket->translations->where('language_id', 3)->first()->name,
            'tag' => $ticket->tag,
            'status' => $ticket->active
        ];
    }

    /**
     * @param TicketTopicsRepository $repository
     * @return array
     */
    public function getTopics(TicketTopicsRepository $repository)
    {
        $id = $this->request->all()['id'];
        $topic = $repository->find($id);
        return [
            'id' => $topic->id,
            'category_id' => $topic->category_id,
            'status' => $topic->active,
            'tag' => $topic->tag,
            'br' => [
                'name' =>  $topic->translations->where('language_id', 1)->first()->name,
                'template' =>  $topic->translations->where('language_id', 1)->first()->template
            ],
            'en' => [
                'name' =>  $topic->translations->where('language_id', 2)->first()->name,
                'template' =>  $topic->translations->where('language_id', 2)->first()->template
            ],
            'es' => [
                'name' =>  $topic->translations->where('language_id', 3)->first()->name,
                'template' =>  $topic->translations->where('language_id', 3)->first()->template
            ]
        ];
    }
}