<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Language;

class LanguagesRepository extends Repository
{
    /**
     * @return Language
     */
    public function getModel()
    {
        return (new Language());
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->getModel()
            ->select('id','name')
            ->get();
    }
}