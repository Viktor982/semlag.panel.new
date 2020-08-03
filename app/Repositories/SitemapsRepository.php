<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\Sitemap;

class SitemapsRepository extends Repository
{
    /**
     * @return Sitemap
     */
    public function getModel()
    {
        return (new Sitemap());
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->getModel()
            ->select('id', 'priority', 'route' ,'frequency', 'created_at','active')
            ->paginate(10);
    }
}