<?php


namespace NPDashboard\Charts;

use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\UiStats;

class Ui extends AbstractChart
{
    public static $events = [ 0 => 'ui_first_init',
                              1 => 'ui_trial_test_button_clicked',
                              2 => 'ui_trial_start_now_button_clicked',
                              3 => 'ui_optimization_button_clicked',
                              4 => 'ui_register_now_button_clicked',
                              5 => 'ui_first_time_optimization_button_clicked',
                              6 => 'ui_first_time_connection_received' ]; 

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @param $day
     * @return array
     */
    protected static function hourly(array $result, $year, $month, $day, $event = null, $software_id = null)
    {
        $ui = UiStats::select('created_at', 'event_type', 'is_trial')
            ->distinct('machine_id')
            ->where('software_id', '=', $software_id)
            ->where('created_at', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->where('created_at', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->where('event_type', '=', "$event")
            ->get()
            ->groupBy(function ($s) {
                return (new \Carbon\Carbon($s->created_at))->format('H');
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($ui as $hour => $amount) {
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
    protected static function daily(array $result, $year, $month, $event = null, $software_id = null)
    {
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $ui = UiStats::select('created_at', 'event_type', 'is_trial')
            ->distinct('machine_id')
            ->where('software_id', '=', $software_id)
            ->where('created_at', '>=', "{$year}-{$month}-01 00:00:00")
            ->where('created_at', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->where('event_type', '=', "$event")
            ->get()
            ->groupBy(function ($s) {
                return (new \Carbon\Carbon($s->created_at))->format('d') - 1;
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($ui as $day => $amount) {
            $result[$day * 1] = $amount;
        }
        return $result;
    }

    protected static function yearly(array $result, $year, $event = null, $software_id = null)
    {
        $ui = UiStats::select('created_at', 'event_type', 'is_trial')
            ->distinct('machine_id')
            ->where('software_id', '=', $software_id)
            ->where('created_at', '>=', "{$year}-01-01 00:00:00")
            ->where('created_at', '<=', "{$year}-12-31 23:59:59")
            ->where('event_type', '=', "$event")
            ->get()
            ->groupBy(function ($s) {
                return (new \Carbon\Carbon($s->created_at))->format('m') - 1;
            })
            ->map(function ($c) {
                return $c->count();
            });

        foreach ($ui as $month => $amount) {
            $result[$month * 1] = $amount;
        }

        return $result;
    }

    public static function chart()
    {
        $args = func_get_args();
        foreach ($args as $key => $value) {
          switch (count($args)) {
            case 3:
                $args[1] = static::$events[$args[1]];
                $result = static::buildEmptyPeriod(3);
                return static::yearly($result, ... $args);
                break;
            case 4:
                $args[2] = static::$events[$args[2]];
                $result = static::buildEmptyPeriod(2, $args[1], $args[0]);
                return static::daily($result,... $args);
                break;
            case 5:
                $args[3] = static::$events[$args[3]];
                $result = static::buildEmptyPeriod(1);
                return static::hourly($result,... $args);
                break;
            }  
        }
        
    }
}