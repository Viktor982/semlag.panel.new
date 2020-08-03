<?php


namespace NPDashboard\Http\Controllers\API;

use NPCore\AppCapsule;
use NPDashboard\Http\Controllers\API\RulesController;
use NPDashboard\Charts\SalesByGateway;
use NPDashboard\Charts\SalesAvg;
use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Charts\Ui;
use NPDashboard\Charts\UiTrial;
use NPDashboard\Charts\Customers;
use NPDashboard\Charts\Sales;
use NPDashboard\Charts\SubsCountries;
use NPDashboard\Charts\Trials;
use NPDashboard\Charts\TrialGames;
use NPDashboard\Charts\TrialsWeek;
use NPDashboard\Charts\TrialsAdword;
use NPDashboard\Charts\TrialsSubdate;
use NPDashboard\Charts\TrialsCountries;
use NPDashboard\Charts\TrialsCountriesGeneral;
use NPDashboard\Charts\Subscriptions;
use NPDashboard\Charts\Conversions;
use NPDashboard\Charts\ConversionsCountries;
use NPDashboard\Repositories\GatewaysRepository;
use NPDashboard\Repositories\CustomersRepository;
use NPDashboard\Repositories\ClientGameInfoLoggerRepository;
use NPDashboard\Charts\UsedCoupons;
use NPDashboard\Charts\GeneratedCoupons;
use NPDashboard\Charts\AffiliateAccesses;
use NPDashboard\Charts\AffiliateRegisters;
use NPDashboard\Charts\AffiliateSales;

class ChartsController extends Controller
{
    /**
     * @var mixed
     */
    private $interval;

    public function __construct()
    {
        $body = AppCapsule::getContainer()['request']->getParsedBody();
        $this->interval = $body['interval'];
        $this->args = explode('-', $body['date']);
    }

    public function general()
    {
        $users = Customers::chart(...$this->args);
        $sales = Sales::chart(...$this->args);
        $trials = Trials::chart(...$this->args);
        $trials_new = Trials::chartNew(...$this->args);
        $trials_week = TrialsWeek::chart(...$this->args);
        $trials_adword = TrialsAdword::chart(...$this->args);
        $trials_subdate = TrialsSubdate::chart(...$this->args);

        $chart = [
            'period' => $this->buildPeriod(),
            'series' => [
                [
                    'name' => 'Registros',
                    'color' => '#003399',
                    'data' => $users
                ],
                [
                    'name' => 'Vendas',
                    'color' => '#ff0000',
                    'data' => $sales
                ],
                [
                    'name' => 'Trials',
                    'color' => '#71b09b',
                    'data' => $trials
                ],
                [
                    'name' => 'Trials (NEW)',
                    'color' => '#658300',
                    'data' => $trials_new
                ],
                [
                    'name' => 'Trials 7 Dias',
                    'color' => '#e48c12',
                    'data' => $trials_week
                ],
                [
                    'name' => 'Trials Adwords',
                    'color' => '#78F9FF',
                    'data' => $trials_adword
                ],
                [
                    'name' => 'Trials Subs Date',
                    'color' => '#272634',
                    'data' => $trials_subdate
                ]
            ]
        ];
        return $chart;
    }


    /**
     * @return array
     */
    private function buildPeriod()
    {
        switch ($this->interval) {
            case 1:
                return range(0, 23);
                break;
            case 2:
                return range(1, cal_days_in_month(CAL_GREGORIAN, $this->args[1], $this->args[0]));
                break;
            case 3:
                return ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
                break;
            default:
                return [];
                break;
        }
    }

}
