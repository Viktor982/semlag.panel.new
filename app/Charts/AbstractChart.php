<?php


namespace NPDashboard\Charts;


abstract class AbstractChart
{
    /**
     * @param $period
     * @param null $month
     * @param null $year
     * @return array
     */
    protected static function buildEmptyPeriod($period, $month = null, $year = null)
    {
        switch ($period) {
            case 1:
                $x = 24;
                break;
            case 2:
                $x = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                break;
            case 3:
                $x = 12;
                break;
            default:
                $x = 0;
                break;
        }

        $_return = [];

        for($y = 1; $y <= $x; $y++) {
            $_return[] = 0;
        }

        return array_values($_return);
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

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @param $day
     * @return array
     */
    protected abstract static function hourly(array $result, $year, $month, $day);

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @return array
     */
    protected abstract static function daily(array $result, $year, $month);

    /**
     * @param array $result
     * @param $year
     * @return array
     */
    protected abstract static function yearly(array $result, $year);
}