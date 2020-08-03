<?php

namespace NPDashboard\Charts;

use NPDashboard\Models\ClientGameInfoLogger;
use NPDashboard\Models\Customer;
use NPDashboard\Models\Sale;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Eloquent\Collection;
use NPDashboard\Repositories\Bridge\CountryRepository;

class ConversionsCountries extends AbstractChart
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

        $convertedCustomers = Customer::select(DB::raw('count(*) as total'), 'country', DB::raw('HOUR(date_created) as hora'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->rightJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-{$month}-{$day} 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->where('venda.status', Sale::STATUS_APPROVED)
            ->groupBy('country', 'hora')
            ->orderBy('country')
            ->orderBy('hora')
            ->get();

        $unconvertedCustomers = Customer::select(DB::raw('count(*) as total'), 'country', DB::raw('HOUR(date_created) as hora'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->leftJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-{$month}-{$day} 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->whereNull('venda.id')
            ->groupBy('country', 'hora')
            ->orderBy('country')
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

        $convertedCustomers = Customer::select(DB::raw('count(*) as total'), 'country', DB::raw('DAY(date_created) as dia'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->rightJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-{$month}-01 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->where('venda.status', Sale::STATUS_APPROVED)
            ->groupBy('country', 'dia')
            ->orderBy('country')
            ->orderBy('dia')
            ->get();

        $unconvertedCustomers = Customer::select(DB::raw('count(*) as total'), 'country', DB::raw('DAY(date_created) as dia'))
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->leftJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-{$month}-01 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->whereNull('venda.id')
            ->groupBy('country', 'dia')
            ->orderBy('country')
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
        $unconvertedArray = [];
        $convertedArray = [];
        $teste = [];

        $convertedCustomers = Customer::select(DB::raw('count(*) as total'), 'country')
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->rightJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-01-01 00:00:00",  "{$year}-12-31 23:59:59"])
            ->where('venda.status', Sale::STATUS_APPROVED)
            ->groupBy('country')
            ->orderBy('country')
            ->get();

        $unconvertedCustomers = Customer::select(DB::raw('count(*) as total'), 'country')
            ->join('subscriptions', 'subscriptions.user_id', 'usuario.id')
            ->leftJoin('venda', 'venda.assinatura_id', 'subscriptions.id')
            ->whereNotNull('ref_ads')
            ->whereBetween('date_created', ["{$year}-01-01 00:00:00",  "{$year}-12-31 23:59:59"])
            ->whereNull('venda.id')
            ->groupBy('country')
            ->orderBy('country')
            ->get();

        $countries = array_merge($convertedCustomers->pluck('country')->toArray(), $unconvertedCustomers->pluck('country')->toArray());
        $groupConverted = $convertedCustomers->groupBy('country');
        $groupUnconverted = $unconvertedCustomers->groupBy('country');

        foreach ($countries as $country) {
            $convertedArray[] = !empty($groupConverted->get($country))
                ? $groupConverted->get($country)->first()->total
                : 0;
            $unconvertedArray[] = !empty($groupUnconverted->get($country))
                ? $groupUnconverted->get($country)->first()->total
                : 0;
        }

        return [
            'chart' => 'column',
            'categories' => $countries,
            'series' => [
                0 => [
                    'name' => 'Convertido',
                    'data' => $convertedArray
                ],
                1 => [
                    'name' => 'Não Convertido',
                    'data' => $unconvertedArray
                ]
            ]
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
