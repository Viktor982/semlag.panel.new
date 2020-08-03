<?php

namespace NPDashboard\Charts;

use NPDashboard\Models\Customer;
use NPDashboard\Models\Sale;
use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\ClientInfoLogger as Client;
use Illuminate\Database\Capsule\Manager as DB;

class SalesAvg extends AbstractChart
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
        $hours = $day == date("d")
            ? (int)date("h")
            : 24;

        $avgSales = Sale::select(DB::raw("count(*)/{$hours} as total"))
            ->where('venda.status', 2)
            ->whereDate('venda.date_approved', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->whereDate('venda.date_approved', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->first();

        $avgTrials = Customer::select(DB::raw("count(*)/24 as total"))
            ->whereDate('date_created', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->whereDate('date_created', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->where('trial', true)
            ->first();

        $avgRegisters = Customer::select(DB::raw("count(*)/24 as total"))
            ->whereDate('date_created', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->whereDate('date_created', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->first();

        $avgTrialsSubDate = Customer::select(DB::raw("count(*)/24 as total"))
            ->whereDate('trial_sub_date', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->whereDate('trial_sub_date', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->first();

        return [
            'categories' => [
                'Média de vendas',
                'Média de registros',
                'Média geral de trials',
                'Média de trials',
                'Média de trials subdate'
            ],
            'data' => [
                $avgSales->total,
                $avgRegisters->total,
                ($avgTrials->total + $avgTrialsSubDate->total) / 2,
                $avgTrials->total,
                $avgTrialsSubDate->total
            ]
        ];
    }

    /**
     * @param array $result
     * @param $year
     * @param $month
     * @return array
     */
    protected static function daily(array $result, $year, $month)
    {
        $day = $month == date("m")
            ? date("d")
            : cal_days_in_month(CAL_GREGORIAN, $month, $year);


        $avgSales = Sale::select(DB::raw("count(*)/${day} as total"))
            ->where('venda.status', 2)
            ->whereYear('venda.date_approved', '=', $year)
            ->whereMonth('venda.date_approved', '=', $month)
            ->whereDay('venda.date_approved', '>=', '01')
            ->whereDay('venda.date_approved', '<=', $day)
            ->first();

        $avgTrials = Customer::select(DB::raw("count(*)/${day} as total"))
            ->whereYear('date_created', '=', $year)
            ->whereMonth('date_created', '=', $month)
            ->whereDay('date_created', '>=', '01')
            ->whereDay('date_created', '<=', $day)
            ->where('trial', true)
            ->first();

        $avgRegisters = Customer::select(DB::raw("count(*)/${day} as total"))
            ->whereYear('date_created', '=', $year)
            ->whereMonth('date_created', '=', $month)
            ->whereDay('date_created', '>=', '01')
            ->whereDay('date_created', '<=', $day)
            ->first();

        $avgTrialsSubDate = Customer::select(DB::raw("count(*)/${day} as total"))
            ->whereYear('trial_sub_date', '=', $year)
            ->whereMonth('trial_sub_date', '=', $month)
            ->whereDay('trial_sub_date', '>=', '01')
            ->whereDay('trial_sub_date', '<=', $day)
            ->first();

        return [
            'categories' => [
                'Média de vendas',
                'Média de registros',
                'Média geral de trials',
                'Média de trials',
                'Média de trials subdate'
            ],
            'data' => [
                $avgSales->total,
                $avgRegisters->total,
                ($avgTrials->total + $avgTrialsSubDate->total) / 2,
                $avgTrials->total,
                $avgTrialsSubDate->total
            ]
        ];
    }

    /**
     * @param array $result
     * @param $year
     * @return array
     */
    protected static function yearly(array $result, $year)
    {
        $daysInYear = 365;

        if ($year == date("Y")) {
            $daysInYear = date('z') + 1;
        } else if (date('L', mktime(0, 0, 0, 1, 1, $year))) {
            $daysInYear = 366;
        }

        $avgSales = Sale::select(DB::raw("count(*)/${daysInYear} as total"))
            ->where('venda.status', 2)
            ->whereYear('venda.date_approved', '>=', $year)
            ->whereYear('venda.date_approved', '<=', $year)
            ->first();

        $avgTrials = Customer::select(DB::raw("count(*)/${daysInYear} as total"))
            ->whereYear('date_created', '>=', $year)
            ->whereYear('date_created', '<=', $year)
            ->where('trial', true)
            ->first();

        $avgRegisters = Customer::select(DB::raw("count(*)/${daysInYear} as total"))
            ->whereYear('trial_sub_date', '>=', $year)
            ->whereYear('trial_sub_date', '<=', $year)
            ->first();

        $avgTrialsSubDate = Customer::select(DB::raw("count(*)/${daysInYear} as total"))
            ->whereYear('trial_sub_date', '>=', $year)
            ->whereYear('trial_sub_date', '<=', $year)
            ->first();

        return [
            'categories' => [
                'Média de vendas',
                'Média de registros',
                'Média geral de trials',
                'Média de trials',
                'Média de trials subdate'
            ],
            'data' => [
                $avgSales->total,
                $avgRegisters->total,
                ($avgTrials->total + $avgTrialsSubDate->total) / 2,
                $avgTrials->total,
                $avgTrialsSubDate->total
            ]
        ];
    }

    public static function chart()
    {
        $args = func_get_args();
        switch (count($args)) {
            case 1:
                $result = [];
                return static::yearly($result, ...$args);
                break;
            case 2:
                $result = [];
                return static::daily($result, ...$args);
                break;
            case 3:
                $result = [];
                return static::hourly($result, ...$args);
                break;
        }
    }
}
