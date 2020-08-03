<?php


namespace NPDashboard\Charts;

use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\Sale;

class SalesByGateway extends AbstractChart
{
    /**
     * which gateway
     * @var int
     */
    private static $gateway_id;
    /**
     * is a subscription or normal sale?
     * @var bool
     */
    private static $subscription;
    /**
     * only first recurring?
     * @var bool
     */
    private static $first_subscription;

    /**
     * @return array
     */
    public static function chartForGateway()
    {
        $args = func_get_args();
        $gateway = $args[0];
        $subscription = $args[1];
        $first_subscription = (is_bool($args[2])) ? $args[2] : false;
        $_args = array_slice($args,((is_bool($args[2])) ? 3 : 2));
        self::$gateway_id = $gateway;
        self::$subscription = $subscription;
        self::$first_subscription = $first_subscription;
        return static::chart(...$_args);
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
        $sales = Sale::select('date_approved', 'status')
            ->where('status', 2)
            ->where('date_approved', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->where('date_approved', '<=', "{$year}-{$month}-{$day} 23:59:59");
        $sales = self::gatewayFilters($sales);

        $sales = $sales->get()
            ->groupBy(function ($s) {
                return (new \Carbon\Carbon($s->date_approved))->format("H");
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($sales as $hour => $amount) {
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
        $sales = Sale::select('date_approved', 'status')
            ->where('status', 2)
            ->where('date_approved', '>=', "{$year}-{$month}-01 00:00:00")
            ->where('date_approved', '<=', "{$year}-{$month}-{$day} 23:59:59");
        $sales = self::gatewayFilters($sales);

        $sales = $sales->get()
            ->groupBy(function ($s) {
                return (new \Carbon\Carbon($s->date_approved))->format('d') - 1;
            })
            ->map(function ($c) {
                return $c->count();
            });
        foreach ($sales as $day => $amount) {
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
        $sales = Sale::select('id', 'date_approved', 'status', 'metodo')
            ->where('date_approved', '>=', "{$year}-01-01 00:00:00")
            ->where('date_approved', '<=', "{$year}-12-31 23:59:59")
            ->where('status', 2);
        $sales = self::gatewayFilters($sales);
        $sales = $sales->get()
            ->groupBy(function ($s) {
                return (new \Carbon\Carbon($s->date_approved))->format('m') -1;
            })
            ->map(function ($c) {
                return $c->count();
            });

        foreach ($sales as $month => $amount) {
            $result[$month * 1] = $amount;
        }

        return $result;
    }

    private static function gatewayFilters($sales)
    {
        $sales = $sales->where('metodo', self::$gateway_id);
        if(self::$subscription) {
            $sales = $sales->where('assinatura_id', '!=', null);
        }
        if(self::$first_subscription) {
            $sales = $sales->where('first_recurring', '!=', null);
        }else {
            $sales = $sales->where('first_recurring', '=', null);
        }
        return $sales;
    }
}