<?php


namespace NPDashboard\Charts;

use NPDashboard\Models\Customer;
use NPDashboard\Charts\AbstractChart;

class Customers extends AbstractChart
{
    /**
     * @param array $result
     * @param $year
     * @param $month
     * @param $day
     * @return array
     */
    protected static function hourly(array $result, $year, $month, $day)
    {
        $customers = Customer::select('id', 'date_created')
            ->where("date_created", ">=", "{$year}-{$month}-{$day} 00:00:00")
            ->where("date_created", "<=", "{$year}-{$month}-{$day} 23:59:59")
            ->get()
            ->groupBy(function($u) {
                return (new \Carbon\Carbon($u->date_created))
                    ->format("H");
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach($customers as $hour => $amount) {
            $result[$hour * 1] = $amount;
        }
        return $result;
    }

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @return array
     */
    protected static function daily(array $result, $year, $month)
    {
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $customers = Customer::select('id', 'date_created')
            ->where('date_created', '>=', "{$year}-{$month}-01 00:00:00")
            ->where('date_created', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->get()
            ->groupBy(function ($c) {
                return (new \Carbon\Carbon($c->date_created))->format('d') - 1;
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach($customers as $day => $amount) {
            $result[$day * 1] = $amount;
        }
        return $result;
    }

    /**
     * @param array $result
     * @param $year
     * @return array
     */
    protected static function yearly(array $result, $year)
    {
        $customers = Customer::select('id', 'date_created')
            ->where('date_created', '>=', "{$year}-01-01 00:00:00")
            ->where('date_created', '<=', "{$year}-12-31 23:59:59")
            ->get()
            ->groupBy(function ($c) {
                return (new \Carbon\Carbon($c->date_created))->format('m') - 1;
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($customers as $month => $amount) {
            $result[$month * 1] = $amount;
        }
        return $result;
    }
}