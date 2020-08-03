<?php


namespace NPDashboard\Charts;

use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\AffiliateAccesses as AccessesModel;

class AffiliateAccesses extends AbstractChart
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
            $accesses = AccessesModel::select('date', 'affiliated_id')
                ->where("date", ">=", "{$year}-{$month}-{$day} 00:00:00")
                ->where("date", "<=", "{$year}-{$month}-{$day} 23:59:59")
                ->where('affiliated_id', $id)
                ->get()
                ->groupBy(function($c) {
                    return (new \Carbon\Carbon($c->date))
                        ->format("H");
                })
                ->map(function ($c) {
                    return $c->count();
                });
            foreach($accesses as $hour => $amount) {
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
            $accesses = AccessesModel::select('date', 'affiliated_id')
                ->where('date', '>=', "{$year}-{$month}-01 00:00:00")
                ->where('date', '<=', "{$year}-{$month}-{$day} 23:59:59")
                ->where('affiliated_id', $id)
                ->get()
                ->groupBy(function ($t) {
                    return (new \Carbon\Carbon($t->date))->format('d') - 1;
                })
                ->map(function ($c) {
                    return $c->count();
                });
            foreach($accesses as $day => $amount) {
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
            $accesses = AccessesModel::select('date', 'affiliated_id')
                ->where('date', '>=', "{$year}-01-01 00:00:00")
                ->where('date', '<=', "{$year}-12-31 23:59:59")
                ->where('affiliated_id', $id)
                ->get()
                ->groupBy(function ($t) {
                    return (new \Carbon\Carbon($t->date))->format('m') -1;
                })
                ->map(function ($c) {
                    return $c->count();
                });
            foreach ($accesses as $month => $amount) {
                $result[$month * 1] = $amount;
            }
        }
        return $result;
    }
}