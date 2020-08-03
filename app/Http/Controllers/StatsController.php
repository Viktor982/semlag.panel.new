<?php

namespace NPDashboard\Http\Controllers;

use NPDashboard\Http\Controllers\Controller;

class StatsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function general()
    {
        return view('pages.stats.general');
    }

}