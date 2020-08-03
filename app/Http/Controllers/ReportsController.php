<?php

namespace NPDashboard\Http\Controllers;

class ReportsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function vipCustomers()
    {
        return view('pages.reports.vip-customers');
    }
}