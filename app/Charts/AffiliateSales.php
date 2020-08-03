<?php


namespace NPDashboard\Charts;

use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\Sale;

class AffiliateSales extends AbstractChart
{
    protected static $affiliateEmail;

    /**
     * @return array
     */
    public static function forAffiliate()
    {
        $args = func_get_args();
        self::$affiliateEmail = $args[0];
        return static::chart(...array_slice($args, 1));
    }

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @param $day
     * @return array
     */
    protected static function hourly(array $result, $year, $month, $day)
    {
        if($user = \NPDashboard\Models\Customer::where('usuario',self::$affiliateEmail)->get()->first()) {
            $id = $user->id;
            $sales = Sale::select('date_approved', 'status', 'affiliated_id')
                ->where('status', 2)
                ->where('date_approved', '>=', "{$year}-{$month}-{$day} 00:00:00")
                ->where('date_approved', '<=', "{$year}-{$month}-{$day} 23:59:59")
                ->where('affiliated_id', $id)
                ->get()
                ->groupBy(function ($s) {
                    return (new \Carbon\Carbon($s->date_approved))->format("H");
                })
                ->map(function ($c) {
                    return $c->count();
                });
            foreach ($sales as $hour => $amount) {
                $result[$hour * 1] = $amount;
            }
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
        if($user = \NPDashboard\Models\Customer::where('usuario',self::$affiliateEmail)->get()->first()) {
            $id = $user->id;
            $sales = Sale::select('date_approved', 'status', 'affiliated_id')
                ->where('status', 2)
                ->where('date_approved', '>=', "{$year}-{$month}-01 00:00:00")
                ->where('date_approved', '<=', "{$year}-{$month}-{$day} 23:59:59")
                ->where('affiliated_id', $id)
                ->get()
                ->groupBy(function ($s) {
                    return (new \Carbon\Carbon($s->date_approved))->format('d') - 1;
                })
                ->map(function ($c) {
                    return $c->count();
                });
            foreach ($sales as $day => $amount) {
                $result[$day * 1] = $amount;
            }
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
        if($user = \NPDashboard\Models\Customer::where('usuario',self::$affiliateEmail)->get()->first()) {
            $id = $user->id;
            $sales = Sale::select('id', 'date_approved', 'status', 'affiliated_id')
                ->where('date_approved', '>=', "{$year}-01-01 00:00:00")
                ->where('date_approved', '<=', "{$year}-12-31 23:59:59")
                ->where('status', 2)
                ->where('affiliated_id', $id)
                ->get()
                ->groupBy(function ($s) {
                    return (new \Carbon\Carbon($s->date_approved))->format('m') -1;
                })
                ->map(function ($c) {
                    return $c->count();
                });
            foreach ($sales as $month => $amount) {
                $result[$month * 1] = $amount;
            }
        }
        return $result;
    }
}