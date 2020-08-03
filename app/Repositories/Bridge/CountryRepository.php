<?php

namespace NPDashboard\Repositories\Bridge;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Bridge\Country;

class CountryRepository extends Repository
{
    public function getModel()
    {
        return (new Country());
    }


    public function getCountries()
    {
        return $this->getModel()->all();
    }
}