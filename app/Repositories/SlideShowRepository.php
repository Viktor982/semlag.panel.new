<?php

namespace NPDashboard\Repositories;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Models\SlideShow;

class SlideShowRepository extends Repository
{
    /**
     * @return SlideShow
     */
    public function getModel()
    {
        return (new SlideShow());
    }

    /**
     * @param $language
     * @return mixed
     */
    public function slidesTable($language)
    {
        return $this->getModel()
            ->select('id', 'language_id', 'title', 'order', 'route_link', 'url', 'active')
            ->where('language_id', $language)
            ->orderBy('order', 'desc')
            ->paginate(10);
    }

}