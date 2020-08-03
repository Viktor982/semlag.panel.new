<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\Toasts;
use NPDashboard\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

class ToastsRepository extends Repository
{
    /**
     * @return Toasts
     */

    public function getModel()
    {
       return (new Toasts());
    }

    public function toastsTable()
    {
        return $this->getModel()
            ->select('*')
            ->orderByDesc('id')
            ->get();
    }
}