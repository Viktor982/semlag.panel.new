<?php

namespace NPDashboard\Charts;

use NPDashboard\Models\Customer;
use NPDashboard\Charts\AbstractChart;
use Illuminate\Database\Capsule\Manager as DB;

class TrialsCountries extends AbstractChart
{
    /**
     * @param array $result
     * @param $year
     * @param $month
     * @param $day
     * @return array
     */
    protected static function hourly(array $result, $year, $month, $day, $country = null)
    {
        $countries = [];
        $lastCountry = "";
        $newResult = $result;

        $trials = Customer::select(DB::raw('hour(trial_sub_date) as hour_trial'), 'country', DB::raw('count(*) as total'))
            ->where("trial_sub_date", ">=", "{$year}-{$month}-{$day} 00:00:00")
            ->where("trial_sub_date", "<=", "{$year}-{$month}-{$day} 23:59:59")
            ->groupBy('country', 'hour_trial')
            ->orderBy('country')
            ->orderBy('hour_trial')
            ->get();

        foreach ($trials as $trial) {

            if ($trial->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$trial->hour_trial] = $trial->total;
            $countries[$trial->country ?? 'Indefinido'] = [
                'data' => $newResult
            ];
            $lastCountry = $trial->country;
        }

        return $countries;
    }

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @return array
     */
    protected static function daily(array $result, $year, $month, $country = null)
    {
        $countries = [];
        $lastCountry = "";
        $newResult = $result;
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $trials = Customer::select(DB::raw('day(trial_sub_date) as day_trial'), 'country', DB::raw('count(*) as total'))
            ->where('trial_sub_date', '>=', "{$year}-{$month}-01 00:00:00")
            ->where('trial_sub_date', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->groupBy('country', 'day_trial')
            ->orderBy('country')
            ->orderBy('day_trial')
            ->get();

        foreach ($trials as $trial) {

            if ($trial->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$trial->day_trial] = $trial->total;
            $countries[$trial->country ?? 'Indefinido'] = [
                'data' => $newResult
            ];
            $lastCountry = $trial->country;
        }

        return $countries;
    }

    /**
     * @param array $result
     * @param $year
     * @return array
     */
    protected static function yearly(array $result, $year, $country = null)
    {
        $countries = [];
        $lastCountry = "";
        $newResult = $result;

        $trials = Customer::select(DB::raw('month(trial_sub_date) as month_trial'), 'country', DB::raw('count(*) as total'))
            ->where('trial_sub_date', '>=', "{$year}-01-01 00:00:00")
            ->where('trial_sub_date', '<=', "{$year}-12-31 23:59:59")
            ->groupBy('country', 'month_trial')
            ->orderBy('country')
            ->orderBy('month_trial')
            ->get();

        foreach ($trials as $trial) {

            if ($trial->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$trial->month_trial] = $trial->total;
            $countries[$trial->country ?? 'Indefinido'] = [
                'data' => $newResult
            ];
            $lastCountry = $trial->country;
        }

        return $countries;
    }

    public static function chart()
    {
        $args = func_get_args();

        switch (count($args)) {
            case 2:
                $result = static::buildEmptyPeriod(3);
                return static::yearly($result, ...$args);
                break;
            case 3:
                $result = static::buildEmptyPeriod(2, $args[1], $args[0]);
                return static::daily($result, ...$args);
                break;
            case 4:
                $result = static::buildEmptyPeriod(1);
                return static::hourly($result, ...$args);
                break;
        }
    }
}
