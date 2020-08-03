<?php


namespace NPDashboard\Repositories;


use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\BannerForCountry;

class BannerForCountriesRepository extends Repository
{
    /**
     * @return BannerForCountry
     */
    public function getModel()
    {
        return (new BannerForCountry());
    }

    /**
     * @return mixed
     */
    public function allCountries()
    {
        return $this->getModel()
            ->select('id', 'name', 'code', 'image_id', 'url', 'active')
            ->paginate(10);
    }
}