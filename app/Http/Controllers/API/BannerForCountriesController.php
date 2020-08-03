<?php


namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;

use NPDashboard\Repositories\BannerForCountriesRepository;

class BannerForCountriesController extends Controller
{
    /**
     * @param BannerForCountriesRepository $repository
     * @return array
     */
    public function getBanner(BannerForCountriesRepository $repository)
    {
        $banner = $repository->find($this->request->all()['id']);
        return $data[] = [
            'id' => $banner->id,
            'country' => $banner->name,
            'url' => $banner->url,
            'image' => $banner->image->slug
        ];
    }
}