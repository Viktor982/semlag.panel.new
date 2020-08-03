<?php

namespace NPDashboard\Charts;

use NPDashboard\Models\ClientGameInfoLogger;
use NPDashboard\Models\ClientInfoLogger as Client;
use NPDashboard\Charts\AbstractChart;
use Illuminate\Database\Capsule\Manager as DB;

class TrialGames extends AbstractChart
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
        $resultGames = [];
        $newResult = $result;
        $lastRuleGroupName = "";

        $trials = ClientGameInfoLogger::select('rulegroup_name', DB::raw('count(DISTINCT client_id) as total'), DB::raw('HOUR(updated_at) as hora'))
            // ->whereExists(function ($query) {
            //     Client::select(DB::raw(1))
            //         ->from('usuario')
            //         ->whereRaw('usuario.id = client_game_info.client_id')
            //         ->whereRaw('usuario.trial_time != NULL');
            // })
            ->whereIn("rulegroup_name", $games)
            ->where('updated_at', '>=', "{$year}-{$month}-{$day} 00:00:00")
            ->where('updated_at', '<=', "{$year}-{$month}-{$day} 23:59:59")
            ->groupBy('rulegroup_name', 'hora')
            ->orderBy('rulegroup_name')
            ->orderBy('hora')
            ->get();

        foreach ($trials as $trial) {
            if ($trial->rulegroup_name != $lastRuleGroupName) {
                $newResult = $result;
            }

            $newResult[$trial->hora] = $trial->total;
            $resultGames[$trial->rulegroup_name] = [
                'data' => $newResult
            ];
            $lastRuleGroupName = $trial->rulegroup_name;
        }

        return $resultGames;
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

        $resultGames = [];
        $newResult = $result;
        $lastRuleGroupName = "";

        $trials = ClientGameInfoLogger::select('rulegroup_name', DB::raw('count(DISTINCT client_id) as total'), DB::raw('DAY(updated_at) as dia'))
            ->whereBetween('updated_at', ["{$year}-{$month}-01 00:00:00",  "{$year}-{$month}-{$day} 23:59:59"])
            ->whereIn("rulegroup_name", $games)
            ->groupBy('rulegroup_name', 'dia')
            ->orderBy('rulegroup_name')
            ->orderBy('dia')
            ->get();

        foreach ($trials as $trial) {
            if ($trial->rulegroup_name != $lastRuleGroupName) {
                $newResult = $result;
            }

            $newResult[$trial->dia] = $trial->total;
            $resultGames[$trial->rulegroup_name] = [
                'data' => $newResult
            ];
            $lastRuleGroupName = $trial->rulegroup_name;
        }

        return $resultGames;
    }

    /**
     * @param array $result
     * @param $year
     * @return array
     */
    protected static function yearly(array $result, $year, $games = null)
    {

        $resultGames = [];
        $newResult = $result;
        $lastRuleGroupName = "";

        $trials = ClientGameInfoLogger::select('rulegroup_name', DB::raw('count(DISTINCT client_id) as total'), DB::raw('MONTH(updated_at) as mes'))
            ->whereIn("rulegroup_name", $games)
            ->where('updated_at', '>=', "{$year}-01-01 00:00:00")
            ->where('updated_at', '<=', "{$year}-12-31 23:59:59")
            ->groupBy('rulegroup_name', 'mes')
            ->orderBy('rulegroup_name')
            ->orderBy('mes')
            ->get();

        foreach ($trials as $trial) {
            if ($trial->rulegroup_name != $lastRuleGroupName) {
                $newResult = $result;
            }

            $newResult[$trial->mes] = $trial->total;
            $resultGames[$trial->rulegroup_name] = [
                'data' => $newResult
            ];
            $lastRuleGroupName = $trial->rulegroup_name;
        }

        return $resultGames;
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
