<?php

namespace NPDashboard\Charts;

use NPDashboard\Models\ClientGameInfoLogger;
use NPDashboard\Models\Customer;
use NPDashboard\Models\Sale;
use Illuminate\Database\Capsule\Manager as DB;

class Conversions extends AbstractChart
{
    /**
     * @param array $result
     * @param $year
     * @param $month
     * @param $day
     * @return array
     */
    protected static function hourly(array $result, $year, $month, $day, $games = null)
    {
        $resultUnconvertedCustomers = $result;
        $resultConvertedCustomers = $result;

        $convertedCustomers = Customer::select(DB::raw('count(*) as total'), DB::raw('HOUR(date_created) as hora'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->rightJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-{$month}-{$day} 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->where('venda.status', Sale::STATUS_APPROVED)
            ->groupBy('hora')
            ->orderBy('hora')
            ->get();

        $unconvertedCustomers = Customer::select(DB::raw('count(*) as total'), DB::raw('HOUR(date_created) as hora'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->leftJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-{$month}-{$day} 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->whereNull('venda.id')
            ->groupBy('hora')
            ->orderBy('hora')
            ->get();

        foreach ($convertedCustomers as $customer) {
            $resultConvertedCustomers[$customer->hora] = $customer->total;
        }

        foreach ($unconvertedCustomers as $customer) {
            $resultUnconvertedCustomers[$customer->hora] = $customer->total;
        }

        return [
            'Clientes Convertidos' => $resultConvertedCustomers,
            'Clientes Cancelados' => $resultUnconvertedCustomers
        ];
    }

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @return array
     */
    protected static function daily(array $result, $year, $month, $games = null)
    {
        $day = cal_days_in_month(CAL_GREGORIAN, $month, $year);

        $resultUnconvertedCustomers = $result;
        $resultConvertedCustomers = $result;

        $convertedCustomers = Customer::select(DB::raw('count(*) as total'), DB::raw('DAY(date_created) as dia'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->rightJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-{$month}-01 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->where('venda.status', Sale::STATUS_APPROVED)
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();

        $unconvertedCustomers = Customer::select(DB::raw('count(*) as total'), DB::raw('DAY(date_created) as dia'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->leftJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-{$month}-01 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->whereNull('venda.id')
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();

        foreach ($convertedCustomers as $customer) {
            $resultConvertedCustomers[$customer->dia - 1] = $customer->total;
        }

        foreach ($unconvertedCustomers as $customer) {
            $resultUnconvertedCustomers[$customer->dia - 1] = $customer->total;
        }

        return [
            'Clientes Convertidos' => $resultConvertedCustomers,
            'Clientes Cancelados' => $resultUnconvertedCustomers
        ];
    }

    /**
     * @param array $result
     * @param $year
     * @return array
     */
    protected static function yearly(array $result, $year, $games = null)
    {

        $resultUnconvertedCustomers = $result;
        $resultConvertedCustomers = $result;

        $convertedCustomers = Customer::select(DB::raw('count(*) as total'), DB::raw('MONTH(date_created) as mes'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->rightJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-01-01 00:00:00",  "{$year}-12-31 23:59:59"])
            ->where('venda.status', Sale::STATUS_APPROVED)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $unconvertedCustomers = Customer::select(DB::raw('count(*) as total'), DB::raw('MONTH(date_created) as mes'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->leftJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-01-01 00:00:00",  "{$year}-12-31 23:59:59"])
            ->whereNull('venda.id')
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        foreach ($convertedCustomers as $customer) {
            $resultConvertedCustomers[$customer->mes - 1] = $customer->total;
        }

        foreach ($unconvertedCustomers as $customer) {
            $resultUnconvertedCustomers[$customer->mes - 1] = $customer->total;
        }

        return [
            'Clientes Convertidos' => $resultConvertedCustomers,
            'Clientes Cancelados' => $resultUnconvertedCustomers
        ];
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
