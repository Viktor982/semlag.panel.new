<?php


namespace NPDashboard\Repositories;


use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\TicketTopics;

class TicketTopicsRepository extends Repository
{
    /**
     * @return TicketTopics
     */
    public function getModel()
    {
        return (new TicketTopics());
    }

    /**
     * @return mixed
     */
    public function topicsTable()
    {
        return $this->getModel()
            ->select('id', 'category_id', 'tag', 'active', 'created_at', 'updated_at')
            ->paginate(10);
    }
}