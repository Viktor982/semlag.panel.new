<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use Slim\Collection;

class LanguageRepository extends Repository
{
    /**
     * @var array
     */
    private $_data = [
        ['id'=> 1, 'name' => 'Português', 'short'=> 'br'],
        ['id'=> 2, 'name' => 'Inglês', 'short'=> 'en'],
        ['id'=> 3, 'name' => 'Espanhol', 'short'=> 'es'],
    ];

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getModel()
    {
        return collect($this->_data);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->getModel()->all();
    }

    /**
     * @param $short
     * @return mixed
     */
    public function findByShort($short)
    {
        return $this->getModel()->where('short', $short)->first();
    }
}