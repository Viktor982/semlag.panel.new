<?php


namespace NPDashboard\Services\Infrastructure;

use NPDashboard\Models\Customer as CustomerModel;
use NPDashboard\Repositories\CustomersRepository;
use NPDashboard\Repositories\SalesRepository;
use NPDashboard\Services\Traits\HttpClient;
use NPDashboard\Services\IpInfoService;
use NPDashboard\Repositories\TrialsRepository;
use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Customer
{

    use HttpClient;

    /**
     * @var IpInfoService
     */
    private $ipService;

    public function __construct()
    {
        $this->ipService = new IpInfoService();
    }

    /**
     * @param $start
     * @param $end
     * @return array
     */
    public function customers($start, $end)
    {
        $customersRepository = (new CustomersRepository());
        $result = [];
        $client = $this->getNpInfraClient();
        $tokens = [];
        $usersByToken = [];
        $tokenById = [];
        $loginsRequestOptions = [
            'form_params' => [
                '_fields' => [
                    'id',
                    'trial',
                    'token'
                ],
                'trial' => 0,
                'sid' => 1,
                'created_at' => [
                    'start' => $start,
                    'end' => $end
                ]
            ]
        ];
        $loginsRequest = $client->post('http://infos.infra.hue.nptunnel.com/api/client_log_data/public/login', $loginsRequestOptions);
        $loginsResponse = \GuzzleHttp\json_decode($loginsRequest->getBody()->getContents());

        foreach($loginsResponse as $customerLogin) {
            $tokens[] = $customerLogin->token;
            $tokenById[$customerLogin->id] = $customerLogin->token;
            $result[$customerLogin->token]['result'] = [];
        }

        $customersByToken = $customersRepository
            ->findByToken($tokens)
            ->keyBy('utoken');

        $affiliatesIds = $customersByToken->filter(function ($c) {
            return $c->affiliated_reference_id;
        })
        ->map(function ($c) {
            return $c->affiliated_reference_id;
        })
        ->values()
        ->unique()
        ->toArray();

        $affiliates = $customersRepository->findByIds($affiliatesIds)->keyBy('id');

        $customersIds = array_values($customersByToken->map(function ($u){
            return $u->id;
        })->toArray());

        $sales = (new SalesRepository())
            ->findApprovedSaleDatesByCustomerId($customersIds)
            ->sortBy('data_vigencia');
        $salesById = [];

        foreach($sales as $_sale) {
            $salesById[$_sale->usuario_id][] = $_sale;
        }

        $generator = function ($tokens) use($start, $end){
            $uri = 'http://infos.infra.hue.nptunnel.com/api/client_log_data/public/connection';
            foreach(array_chunk($tokens, 50) as $block) {
                $body = \GuzzleHttp\json_encode([
                    '_fields' => [
                        'login_id',
                        'rulegroup',
                        'process',
                        'created_at',
                        'updated_at',
                        'rule_id',
                    ],
                    'login_id' => $block,
                    'created_at' => [
                        'start' => $start,
                        'end' => $end
                    ]
                ]);
                yield (new Request('POST', $uri, ['Content-Type' => 'application/json'], $body));
            }
        };

        $pool = new Pool($client, $generator(array_keys($tokenById)), [
            'fulfilled' => function ($response, $index) use($customersByToken, $tokenById, &$result, $salesById, $affiliates){
                $decoded = \GuzzleHttp\json_decode($response->getBody()->getContents());
                $collection = collect($decoded)
                    ->filter(function ($c){
                        return $c->updated_at;
                    })
                    ->groupBy('login_id')
                    ->map(function ($c) {
                        return $c->groupBy('rulegroup');
                    });

                foreach($collection as $loginId => $groups) {
                    $_customer = $customersByToken[$tokenById[$loginId]];
                    $_sales = $salesById[$_customer->id];
                    $_id = $_customer->id;
                    $_af = $_customer->affiliated_reference_id;
                    $result[$tokenById[$loginId]]['email'] = $_customer->usuario;
                    $result[$tokenById[$loginId]]['fsale'] = (key_exists($_id, $salesById)) ? $salesById[$_id][0]->data_vigencia : 'nao possui';
                    $result[$tokenById[$loginId]]['lsale'] = (key_exists($_id, $salesById)) ? end($salesById[$_id])->data_vigencia : 'nao possui';
                    $result[$tokenById[$loginId]]['affiliate'] = ($_customer->affiliated_reference_id) ? ['name' => $affiliates[$_af]->nome, 'id' => $_af] : [];
                    foreach($groups as $group => $groupConnections) {
                        $_start = null;
                        $_end = null;
                        $_total = 0;
                        $_process = null;
                        foreach ($groupConnections as $connection) {
                            if(! is_date_overlapped($_start, $_end, $connection->created_at, $connection->updated_at)) {
                                $_start = $connection->created_at;
                                $_end = $connection->updated_at;
                                $_total += strtotime($connection->updated_at) - strtotime($connection->created_at);
                                $_process = $connection->process;
                            }
                        }
                        $result[$tokenById[$loginId]]['games']['time'][$group] += $_total;
                        $result[$tokenById[$loginId]]['games']['process'][$group] = $_process;
                    }
                }

            },
            'rejected' => function () {

            }
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return $result;
    }

    /**
     * @param $start
     * @param $end
     * @return array
     */
    public function trials($start, $end)
    {
        $result = [];
        $tokenById = [];
        $ipsByToken = [];
        $client = $this->getNpInfraClient();
        $trialsRequestOptions = [
            'form_params' => [
                '_fields' => [
                    'id',
                    'trial',
                    'token',
                    'ip'
                ],
                'trial' => 1,
                'sid' => 1,
                'created_at' => [
                    'start' => $start,
                    'end'   => $end
                ]
            ]
        ];
        $trialsRequest = $client->post('http://infos.infra.hue.nptunnel.com/api/client_log_data/public/login',$trialsRequestOptions);
        $trialsReponse = \GuzzleHttp\json_decode($trialsRequest->getBody()->getContents());
        $tokens = [];

        foreach($trialsReponse as $trialLogin) {
            $result[$trialLogin->token] = [];
            $tokenById[$trialLogin->id] = $trialLogin->token;
            $ipsByToken[$trialLogin->token] = $trialLogin->ip;
            $tokens[] = $trialLogin->token;
        }
        $ipsClient = $this->getNpIpClient();
        $ipsReq = $ipsClient->post('many',[
            'form_params' => [
                'ips' => array_values($ipsByToken)
            ]
        ]);
        $ipsRes = \GuzzleHttp\json_decode($ipsReq->getBody()->getContents());
        $trials = (new TrialsRepository())
            ->findByToken($tokens);
        $dateByLogin = $trials
            ->pluck('date', 'utoken')
            ->toArray();
        $freedByLogin = $trials
            ->pluck('freed_location', 'utoken')
            ->toArray();
        $freedIpByLogin = $trials
            ->pluck('freed_address', 'utoken')
            ->toArray();

        $freedIpCCReq = $this->getNpIpClient()->post('many', [
            'form_params' => [
                'ips' => array_unique(array_values($freedIpByLogin))
            ]
        ]);

        $freedIpCCRes = \GuzzleHttp\json_decode($freedIpCCReq->getBody()->getContents());

        $generator = function ($ids) use($start, $end) {
            $uri = 'http://infos.infra.hue.nptunnel.com/api/client_log_data/public/connection';
            foreach(array_chunk($ids, 50) as $block) {
                $body = \GuzzleHttp\json_encode([
                    '_fields' => [
                        'login_id',
                        'rulegroup',
                        'process',
                        'created_at',
                        'updated_at',
                        'rule_id',
                    ],
                    'login_id' => $block,
                    'updated_at' => [
                        'start' => $start,
                        'end' => $end
                    ]
                ]);
                yield (new Request('POST', $uri, ['Content-Type' => 'application/json'], $body));
            }
        };
        $ids = array_keys($tokenById);
        $pool = new Pool($client, $generator($ids), [
            'fulfilled' => function($response, $index) use(&$result, $tokenById, $dateByLogin, $ipsRes, $ipsByToken, $freedByLogin, $freedIpByLogin, $freedIpCCRes) {
                $decoded = \GuzzleHttp\json_decode($response->getBody()->getContents());
                $collection = collect($decoded)
                    ->filter(function ($conn){
                        return $conn->updated_at;
                    })
                    ->groupBy('login_id')
                    ->map(function ($c) {
                        return $c->groupBy('rulegroup');
                    });
                foreach($collection as $loginId => $groups) {
                    $result[$tokenById[$loginId]]['created_at'] = $dateByLogin[$tokenById[$loginId]];
                    $_ip = $ipsByToken[$tokenById[$loginId]];
                    $result[$tokenById[$loginId]]['ip'] = $_ip;
                    $result[$tokenById[$loginId]]['cc'] = ($ipsRes->ips->$_ip !== null) ? $ipsRes->ips->$_ip->country : 'NULL';
                    $result[$tokenById[$loginId]]['freed'] = $freedByLogin[$tokenById[$loginId]];
                    $result[$tokenById[$loginId]]['freed_address'] = $_fip = $freedIpByLogin[$tokenById[$loginId]];
                    $result[$tokenById[$loginId]]['freed_address_cc'] = (property_exists($freedIpCCRes->ips, $_fip)) ? $freedIpCCRes->ips->$_fip->country : 'NULL';
                    foreach($groups as $group => $groupConnections) {
                        $_start = null;
                        $_end = null;
                        $_total = 0;
                        $_process = null;
                        foreach ($groupConnections as $connection) {
                            if(! is_date_overlapped($_start, $_end, $connection->created_at, $connection->updated_at)) {
                                $_start = $connection->created_at;
                                $_end = $connection->updated_at;
                                $_total += strtotime($connection->updated_at) - strtotime($connection->created_at);
                                $_process = $connection->process;
                            }
                        }
                        $result[$tokenById[$loginId]]['games']['time'][$group] += $_total;
                        $result[$tokenById[$loginId]]['games']['process'][$group] = $_process;
                    }
                }
            },
            'rejected' => function() {

            }
        ]);

        $promise = $pool->promise();
        $promise->wait();

        return $result;
    }

    public function live(CustomerModel $customer)
    {
        $client = $this->getNpInfraClient();
        $now = (new \Carbon\Carbon())->timestamp;
        $request = $client->post('http://infos.infra.hue.nptunnel.com/api/client_log_data/public/login',[
            'form_params' => [
                'tokens' => [$customer->utoken],
                'updated_at' => [
                    'start' => $now - 300,
                    'end' => $now + 300
                ]
            ]
        ]);
        $response = \GuzzleHttp\json_decode($request->getBody()->getContents());
        if(count($response)) {
            $login = $response[0];

            $crequest = $client->post('http://infos.infra.hue.nptunnel.com/api/client_log_data/public/connection',[
                'form_params' => [
                    'login_id' => $login->id,
                    'updated_at' => [
                        'start' => $now - 300,
                        'end' => $now + 300
                    ]
                ]
            ]);
            $protocols = [
                6 => 'TCP',
                17 => 'UDP',
            ];
            $cresponse = \GuzzleHttp\json_decode($crequest->getBody()->getContents());
            $connections = collect($cresponse)->map(function ($c) use($protocols){
                $c->duration = gmdate('H:i:s', (new \Carbon\Carbon($c->updated_at))->diffInSeconds());
                $c->protocol = $protocols[$c->protocol];
                return $c;
            });
            $result =  [
                'online' => true,
                'routing_method' => $login->routing_method,
                'version' => $login->version,
                'ip' => $login->ip,
                'ipinfo' => $this->ipService->info($login->ip),
                'connections' => $cresponse
            ];

            return $result;
        }
        return ['online' => false];
    }
}