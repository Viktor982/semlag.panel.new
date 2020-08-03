<?php


namespace NPDashboard\Charts;

use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\Coupon;

class GeneratedCoupons extends AbstractChart
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
        $coupons = Coupon::select('data_cadastro')
            ->where("data_cadastro", ">=", "{$year}-{$month}-{$day} 00:00:00")
            ->where("data_cadastro", "<=", "{$year}-{$month}-{$day} 23:59:59")
            ->get()
            ->groupBy(function ($c) {
                return (new \Carbon\Carbon($c->data_cadastro))
                    ->format("H");
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($coupons as $hour => $amount) {
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
        $coupons = Coupon::select('data_cadastro')
            ->where('data_cadastro', '>=', "{$year}-{$month}-01 00:00:00")
            ->where('data_cadastro', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->get()
            ->groupBy(function ($c) {
                return (new \Carbon\Carbon($c->data_cadastro))->format('d') - 1;
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($coupons as $day => $amount) {
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
        $coupons = Coupon::select('data_cadastro')
            ->where('data_cadastro', '>=', "{$year}-01-01 00:00:00")
            ->where('data_cadastro', '<=', "{$year}-12-31 23:59:59")
            ->get()
            ->groupBy(function ($c) {
                return (new \Carbon\Carbon($c->data_cadastro))->format('m') - 1;
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($coupons as $month => $amount) {
            $result[$month * 1] = $amount;
        }
        return $result;
    }
}