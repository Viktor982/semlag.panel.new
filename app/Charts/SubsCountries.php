<?php

namespace NPDashboard\Charts;

use NPDashboard\Models\Customer;
use NPDashboard\Models\Sale;
use NPDashboard\Charts\AbstractChart;
use NPDashboard\Models\ClientInfoLogger as Client;
use Illuminate\Database\Capsule\Manager as DB;

class SubsCountries extends AbstractChart
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

        $sales = Sale::select(DB::raw('count(DISTINCT venda.usuario_id) as total'), DB::raw('HOUR(date_approved) as hour'), 'usuario.country')
            ->join('usuario', 'usuario.id', 'venda.usuario_id')
            ->where('venda.status', 2)
            ->whereDate('venda.date_approved', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->whereDate('venda.date_approved', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->groupBy('hour', 'usuario.country')
            ->orderBy('usuario.country')
            ->orderBy('hour')
            ->get();

        foreach ($sales as $sale) {

            if ($sale->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$sale->hour] = $sale->total;
            $countries[$sale->country ?? 'Indefinido'] = [
                'data' => $newResult
            ];
            $lastCountry = $sale->country;
        }

        return $countries;
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
        $countries = [];
        $lastCountry = "";
        $newResult = $result;

        $sales = Sale::select(DB::raw('count(DISTINCT venda.usuario_id) as total'), DB::raw('DAY(date_approved) as day'), 'usuario.country')
            ->join('usuario', 'usuario.id', 'venda.usuario_id')
            ->where('venda.status', 2)
            ->whereYear('venda.date_approved', '=', $year)
            ->whereMonth('venda.date_approved', '=', $month)
            ->whereDay('venda.date_approved', '>=', '01')
            ->whereDay('venda.date_approved', '<=', $day)
            ->groupBy('day', 'usuario.country')
            ->orderBy('usuario.country')
            ->orderBy('day')
            ->get();

        foreach ($sales as $sale) {

            if ($sale->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$sale->day] = $sale->total;
            $countries[$sale->country ?? 'Indefinido'] = [
                'data' => $newResult
            ];
            $lastCountry = $sale->country;
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

        $sales = Sale::select(DB::raw('count(DISTINCT venda.usuario_id) as total'), DB::raw('MONTH(date_approved) as mes'), 'usuario.country')
            ->join('usuario', 'usuario.id', 'venda.usuario_id')
            ->where('venda.status', 2)
            ->whereYear('venda.date_approved', '>=', $year)
            ->whereYear('venda.date_approved', '<=', $year)
            ->groupBy('mes', 'usuario.country')
            ->orderBy('usuario.country')
            ->orderBy('mes')
            ->get();


        foreach ($sales as $sale) {

            if ($sale->country != $lastCountry) {
                $newResult = $result;
            }

            $newResult[$sale->mes - 1] = $sale->total;
            $countries[$sale->country ?? 'Indefinido'] = [
                'data' => $newResult
            ];
            $lastCountry = $sale->country;
        }

        return $countries;
    }

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
}
