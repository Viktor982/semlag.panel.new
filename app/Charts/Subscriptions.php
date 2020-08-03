<?php

namespace NPDashboard\Charts;

use NPDashboard\Models\ClientGameInfoLogger;
use NPDashboard\Models\Subscription;
use NPDashboard\Models\Sale;
use Illuminate\Database\Capsule\Manager as DB;

class Subscriptions extends AbstractChart
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
        $resultNewSubscriptions = $result;
        $resultCanceledSubscriptions = $result;
        $resultNotRenewdSubscriptions = $result;

        $totalNewSubscriptions = Subscription::select(DB::raw('count(*) as total'), DB::raw('HOUR(created_at) as hora'))
            ->whereBetween('created_at', ["{$year}-{$month}-{$day} 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->where('status_code', Subscription::STATUS_APPROVED)
            ->groupBy('hora')
            ->orderBy('hora')
            ->get();

        $totalCanceledSubscriptions = Subscription::select(DB::raw('count(*) as total'), DB::raw('HOUR(created_at) as hora'))
            ->whereBetween('created_at', ["{$year}-{$month}-{$day} 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->where('status_code', Subscription::STATUS_CANCELED)
            ->groupBy('hora')
            ->orderBy('hora')
            ->get();

        $totalNotRenewd = Sale::select(DB::raw('count(*) as total'), DB::raw('HOUR(v1.data_vigencia) as HORA'))
            ->from('venda as v1')
            ->where('v1.status', Subscription::STATUS_APPROVED)
            ->whereNotNull('v1.assinatura_id')
            ->whereRaw("v1.data_vigencia BETWEEN DATE_SUB('{$year}-{$month}-{$day} 00:00:00', INTERVAL 1 DAY) AND DATE_SUB('{$year}-{$month}-{$day} 23:59:59', INTERVAL 1 DAY)")
            ->where('v1.data_vigencia', function ($query) use ($year, $month, $day) {
                $query->select(DB::raw('MAX(v2.data_vigencia)'))
                    ->from('venda as v2')
                    ->whereRaw('v1.assinatura_id = v2.assinatura_id')
                    ->whereRaw("v2.data_vigencia BETWEEN DATE_SUB('{$year}-{$month}-{$day} 00:00:00', INTERVAL 1 DAY) AND DATE_SUB('{$year}-{$month}-{$day} 23:59:59', INTERVAL 1 DAY)");
            })
            ->whereNotIn('v1.assinatura_id', function ($query) use ($year, $month, $day) {
                $query->select('v3.assinatura_id')
                    ->from('venda as v3')
                    ->where('v3.status', Subscription::STATUS_APPROVED)
                    ->whereNotNull('v3.assinatura_id')
                    ->whereRaw("v3.data_vigencia BETWEEN '{$year}-{$month}-{$day} 00:00:00' AND '{$year}-{$month}-{$day} 23:59:59'");
            })
            ->groupBy('hora')
            ->orderBy('hora')
            ->get();


        foreach ($totalNewSubscriptions as $subscription) {
            $resultNewSubscriptions[$subscription->hora] = $subscription->total;
        }

        foreach ($totalCanceledSubscriptions as $subscription) {
            $resultCanceledSubscriptions[$subscription->hora] = $subscription->total;
        }

        foreach ($totalNotRenewd as $subscription) {
            $resultNotRenewdSubscriptions[$subscription->hora] = $subscription->total;
        }

        return [
            'Assinaturas Novas' => $resultNewSubscriptions,
            'Assinaturas Canceladas' => $resultCanceledSubscriptions,
            'Assinaturas Não Renovadas' => $resultNotRenewdSubscriptions
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
        $resultNewSubscriptions = $result;
        $resultCanceledSubscriptions = $result;
        $resultNotRenewdSubscriptions = $result;

        $totalNewSubscriptions = Subscription::select(DB::raw('count(*) as total'), DB::raw('DAY(created_at) as dia'))
            ->whereBetween('created_at', ["{$year}-{$month}-01 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->where('status_code', Subscription::STATUS_APPROVED)
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();


        $totalCanceledSubscriptions = Subscription::select(DB::raw('count(*) as total'), DB::raw('DAY(created_at) as dia'))
            ->whereBetween('created_at', ["{$year}-{$month}-01 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->where('status_code', Subscription::STATUS_CANCELED)
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();

        $totalNotRenewd = Sale::select(DB::raw('count(*) as total'), DB::raw('DAY(v1.data_vigencia) as dia'))
            ->from('venda as v1')
            ->where('v1.status', Subscription::STATUS_APPROVED)
            ->whereNotNull('v1.assinatura_id')
            ->whereRaw("v1.data_vigencia BETWEEN DATE_SUB('{$year}-{$month}-01 00:00:00', INTERVAL 1 MONTH) AND DATE_SUB('{$year}-{$month}-{$day} 23:59:59', INTERVAL 1 MONTH)")
            ->where('v1.data_vigencia', function ($query) use ($year, $month, $day) {
                $query->select(DB::raw('MAX(v2.data_vigencia)'))
                    ->from('venda as v2')
                    ->whereRaw('v1.assinatura_id = v2.assinatura_id')
                    ->whereRaw("v2.data_vigencia BETWEEN DATE_SUB('{$year}-{$month}-01 00:00:00', INTERVAL 1 MONTH) AND DATE_SUB('{$year}-{$month}-{$day} 23:59:59', INTERVAL 1 MONTH)");
            })
            ->whereNotIn('v1.assinatura_id', function ($query) use ($year, $month, $day) {
                $query->select('v3.assinatura_id')
                    ->from('venda as v3')
                    ->where('v3.status', Subscription::STATUS_APPROVED)
                    ->whereNotNull('v3.assinatura_id')
                    ->whereRaw("v3.data_vigencia BETWEEN '{$year}-{$month}-01 00:00:00' AND '{$year}-{$month}-{$day} 23:59:59'");
            })
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();

        foreach ($totalNewSubscriptions as $subscription) {
            $resultNewSubscriptions[$subscription->dia - 1] = $subscription->total;
        }

        foreach ($totalCanceledSubscriptions as $subscription) {
            $resultCanceledSubscriptions[$subscription->dia - 1] = $subscription->total;
        }

        foreach ($totalNotRenewd as $subscription) {
            $resultNotRenewdSubscriptions[$subscription->dia - 1] = $subscription->total;
        }

        return [
            'Assinaturas Novas' => $resultNewSubscriptions,
            'Assinaturas Canceladas' => $resultCanceledSubscriptions,
            'Assinaturas Não Renovadas' => $resultNotRenewdSubscriptions
        ];
    }

    /**
     * @param array $result
     * @param $year
     * @return array
     */
    protected static function yearly(array $result, $year, $games = null)
    {
        $resultNewSubscriptions = $result;
        $resultCanceledSubscriptions = $result;
        $resultNotRenewdSubscriptions = $result;

        $totalNewSubscriptions = Subscription::select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) as mes'))
            ->whereBetween('created_at', ["{$year}-01-01 00:00:00",  "{$year}-12-31 23:59:59"])
            ->where('status_code', Subscription::STATUS_APPROVED)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $totalCanceledSubscriptions = Subscription::select(DB::raw('count(*) as total'), DB::raw('MONTH(created_at) as mes'))
            ->whereBetween('created_at', ["{$year}-01-01 00:00:00",  "{$year}-12-31 23:59:59"])
            ->where('status_code', Subscription::STATUS_CANCELED)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $totalNotRenewd = Sale::select(DB::raw('count(*) as total'), DB::raw('MONTH(v1.data_vigencia) as mes'))
            ->from('venda as v1')
            ->where('v1.status', Subscription::STATUS_APPROVED)
            ->whereNotNull('v1.assinatura_id')
            ->whereRaw("v1.data_vigencia BETWEEN DATE_SUB('{$year}-01-01 00:00:00', INTERVAL 1 YEAR) AND DATE_SUB('{$year}-12-31 23:59:59', INTERVAL 1 YEAR)")
            ->where('v1.data_vigencia', function ($query) use ($year) {
                $query->select(DB::raw('MAX(v2.data_vigencia)'))
                    ->from('venda as v2')
                    ->whereRaw('v1.assinatura_id = v2.assinatura_id')
                    ->whereRaw("v2.data_vigencia BETWEEN DATE_SUB('{$year}-01-01 00:00:00', INTERVAL 1 YEAR) AND DATE_SUB('{$year}-12-31 23:59:59', INTERVAL 1 YEAR)");
            })
            ->whereNotIn('v1.assinatura_id', function ($query) use ($year) {
                $query->select('v3.assinatura_id')
                    ->from('venda as v3')
                    ->where('v3.status', Subscription::STATUS_APPROVED)
                    ->whereNotNull('v3.assinatura_id')
                    ->whereRaw("v3.data_vigencia BETWEEN '{$year}-01-01 00:00:00' AND '{$year}-12-31 23:59:59'");
            })
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();


        foreach ($totalNewSubscriptions as $subscription) {
            $resultNewSubscriptions[$subscription->mes - 1] = $subscription->total;
        }

        foreach ($totalCanceledSubscriptions as $subscription) {
            $resultCanceledSubscriptions[$subscription->mes - 1] = $subscription->total;
        }

        foreach ($totalNotRenewd as $subscription) {
            $resultNotRenewdSubscriptions[$subscription->mes - 1] = $subscription->total;
        }


        return [
            'Assinaturas Novas' => $resultNewSubscriptions,
            'Assinaturas Canceladas' => $resultCanceledSubscriptions,
            'Assinaturas Não Renovadas' => $resultNotRenewdSubscriptions
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
