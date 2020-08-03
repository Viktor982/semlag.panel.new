<?php


namespace NPDashboard\Charts;

use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\Subscription;
use NPDashboard\Models\Customer;

class TrialsSubdate extends AbstractChart
{
    /**
     * @param array $result
     * @param $year
     * @param $month
     * @param $day
     * @param $onlyNew
     * @return array
     */
    protected static function hourly(array $result, $year, $month, $day)
    {
        $trials = Customer::select('trial_sub_date')
            ->where('trial_sub_date', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->where('trial_sub_date', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->get()
            ->groupBy(function ($t) {
                return (new \Carbon\Carbon($t->trial_sub_date))->format('H');
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($trials as $hour => $amount) {
            $result[$hour * 1] = $amount;
        }
        return $result;
    }

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @param $onlyNew
     * @return array
     */
    protected static function daily(array $result, $year, $month)
    {
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $trials = Customer::select('trial_sub_date')
            ->where('trial_sub_date', '>=', "{$year}-{$month}-01 00:00:00")
            ->where('trial_sub_date', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->get()
            ->groupBy(function ($t) {
                return (new \Carbon\Carbon($t->trial_sub_date))->format('d') - 1;
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach($trials as $day => $amount) {
            $result[$day * 1] = $amount;
        }
        return $result;
    }

    /**
     * @param array $result
     * @param $year
     * @param $onlyNew
     * @return array
     */
    protected static function yearly(array $result, $year)
    {
        $trials = Customer::select('trial_sub_date')
            ->where('trial_sub_date', '>=', "{$year}-01-01 00:00:00")
            ->where('trial_sub_date', '<=', "{$year}-12-31 23:59:59")
            ->get()
            ->groupBy(function ($t) {
                return (new \Carbon\Carbon($t->trial_sub_date))->format('m') -1;
            })
            ->map(function ($c) {
                return $c->count();
            });


        foreach ($trials as $month => $amount) {
            $result[$month * 1] = $amount;
        }

        return $result;
    }

    /**
     * @return array
     */

    public static function chart()
    {
        $args = func_get_args();
        switch (count($args)) {
            case 1:
                $result = static::buildEmptyPeriod(3);
                return static::yearly($result, ...$args);
                break;
            case 2:
                $result = static::buildEmptyPeriod(2, $args[1], $args[0]);
                return static::daily($result, ...$args);
                break;
            case 3:
                $result = static::buildEmptyPeriod(1);
                return static::hourly($result, ...$args);
                break;
        }
    }
}
