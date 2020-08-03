<?php

namespace NPDashboard\Charts;

use NPDashboard\Models\Customer;
use NPDashboard\Models\Trial;
use NPDashboard\Charts\AbstractChart;
use Illuminate\Database\Capsule\Manager as DB;

class TrialsCountriesGeneral extends AbstractChart
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

        $trialsSevenDays = Customer::select(DB::raw('hour(date_created) as hour_trial'), 'country', DB::raw('count(*) as total'))
            ->whereRaw("date_created >= '{$year}-{$month}-{$day} 00:00:00'")
            ->whereRaw("date_created <= '{$year}-{$month}-{$day} 23:59:59'")
            ->whereRaw('ref_ads like "%nulo%"')
            ->groupBy('country', 'hour_trial')
            ->orderBy('country')
            ->orderBy('hour_trial');

        $trialsThreeDays = Trial::select(DB::raw('hour(date) as hour_trial'), 'country', DB::raw('count(*) as total'))
            ->join('usuario', 'usuario.id', 'trial.user_ref')
            ->whereRaw("date >= '{$year}-{$month}-{$day} 00:00:00'")
            ->whereRaw("date <= '{$year}-{$month}-{$day} 23:59:59'")
            ->whereRaw('is_new = 1')
            ->groupBy('country', 'hour_trial')
            ->orderBy('country')
            ->orderBy('hour_trial')
            ->union($trialsSevenDays);

        $trials = DB::table(
            DB::raw("(" .
                $trialsThreeDays->toSql()
                . ") as trialsTable")
        )
            ->select('hour_trial', 'country', DB::raw('sum(total) as total'))
            ->groupBy('country', 'hour_trial')
            ->orderBy('country')
            ->orderBy('hour_trial')
            ->get();

        foreach ($trials as $trial) {

            if ($trial->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$trial->hour_trial] += $trial->total;
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

        $trialsSevenDays = Customer::select(DB::raw('day(date_created) as day_trial'), 'country', DB::raw('count(*) as total'))
            ->whereRaw("date_created >= '{$year}-{$month}-01 00:00:00'")
            ->whereRaw("date_created <= '{$year}-{$month}-{$day} 23:59:59'")
            ->whereRaw('ref_ads like "%nulo%"')
            ->groupBy('country', 'day_trial')
            ->orderBy('country')
            ->orderBy('day_trial');

        $trialsThreeDays = Trial::select(DB::raw('day(date) as day_trial'), 'country', DB::raw('count(*) as total'))
            ->join('usuario', 'usuario.id', 'trial.user_ref')
            ->whereRaw("date >= '{$year}-{$month}-01 00:00:00'")
            ->whereRaw("date <= '{$year}-{$month}-{$day} 23:59:59'")
            ->whereRaw('is_new = 1')
            ->groupBy('country', 'day_trial')
            ->orderBy('country')
            ->orderBy('day_trial')
            ->union($trialsSevenDays);

        $trials = DB::table(
            DB::raw("(" .
                $trialsThreeDays->toSql()
                . ") as trialsTable")
        )
            ->select('day_trial', 'country', DB::raw('sum(total) as total'))
            ->groupBy('country', 'day_trial')
            ->orderBy('country')
            ->orderBy('day_trial')
            ->get();

        foreach ($trials as $trial) {

            if ($trial->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$trial->day_trial -1] += $trial->total;
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

        $trialsSevenDays = Customer::select(DB::raw('month(date_created) as month_trial'), 'country', DB::raw('count(*) as total'))
            ->whereRaw("date_created >= '{$year}-01-01 00:00:00'")
            ->whereRaw("date_created <= '{$year}-12-31 23:59:59'")
            ->whereRaw('ref_ads like "%nulo%"')
            ->groupBy('country', 'month_trial')
            ->orderBy('country')
            ->orderBy('month_trial');
        // ->get();

        $trialsThreeDays = Trial::select(DB::raw('month(date) as month_trial'), 'country', DB::raw('count(*) as total'))
            ->join('usuario', 'usuario.id', 'trial.user_ref')
            ->whereRaw("date >= '{$year}-01-01 00:00:00'")
            ->whereRaw("date <= '{$year}-12-31 23:59:59'")
            ->whereRaw('is_new = 1')
            ->groupBy('country', 'month_trial')
            ->orderBy('country')
            ->orderBy('month_trial')
            ->union($trialsSevenDays);

        $trials = DB::table(
            DB::raw("(" .
                $trialsThreeDays->toSql()
                . ") as trialsTable")
        )
            ->select('month_trial', 'country', DB::raw('sum(total) as total'))
            ->groupBy('country', 'month_trial')
            ->orderBy('country')
            ->orderBy('month_trial')
            ->get();

        foreach ($trials as $trial) {

            if ($trial->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$trial->month_trial -1] += $trial->total;
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
