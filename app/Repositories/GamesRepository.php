<?php

namespace NPDashboard\Repositories;
use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Game;

class GamesRepository extends Repository
{
    /**
     * @return Game
     */

    public function getModel()
    {
        return (new Game());
    }

    /**
     * @return mixed
     */
    public function gamesTable()
    {
        return $this->getModel()
            ->select('id', 'name', 'slug', 'fixed_cover', 'created_at', 'updated_at', 'page_access')
            ->paginate(10);
    }

    /**
     * @return mixed
     */
    public function games()
    {
        return $this->getModel()
            ->select('id', 'name')
            ->get();
    }
}