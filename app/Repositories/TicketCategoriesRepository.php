<?php


namespace NPDashboard\Repositories;


use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\TicketCategories;

class TicketCategoriesRepository extends Repository
{
    /**
     * @return TicketCategories
     */
    public function getModel()
    {
        return (new TicketCategories());
    }

    /**
     * @return mixed
     */
    public function categoriesTable()
    {
        return $this->getModel()
            ->select('id', 'active', 'tag', 'created_at', 'updated_at')
            ->paginate(10);
    }
}