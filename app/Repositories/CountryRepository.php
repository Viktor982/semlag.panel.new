<?php

namespace NPDashboard\Repositories;

use NPDashboard\Models\Country;
use NPDashboard\Repositories\Repository;
use Illuminate\Database\Eloquent\Model;

class CountryRepository extends Repository
{
    /**
     * @return Country
     */

    public function getModel()
    {
       return (new Country());
    }

    /**
     * @return mixed
     */
    public function listCountries()
    {
        return $this->getModel()
           ->select('id', 'short_name', 'alpha2_code', 'alpha3_code', 'numeric_code')
           ->get();
    }

}