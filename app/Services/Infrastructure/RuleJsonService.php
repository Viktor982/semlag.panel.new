<?php
namespace NPDashboard\Services\Infrastructure;


use function Clue\StreamFilter\append;
use NPCore\AppCapsule;
use NPDashboard\Repositories\RuleAliasRulegroupRepository;
use NPDashboard\Repositories\RuleFilterRepository;
use NPDashboard\Repositories\RuleProcessListRepository;
use NPDashboard\Repositories\RuleRulegroupRepository;
use NPDashboard\Repositories\RulesRepository;
use NPDashboard\Repositories\Bridge\InfoRepository;

class RuleJsonService
{
    private $repository;
    private $repository_rulegroups;
    private $repository_processlist;
    private $default_path;
    private $repository_aliasgroup;
    private $repository_filters;
    private $repository_info;

    /**
     * RuleJsonService constructor.
     */
    public function __construct()
    {
        $this->repository = new RulesRepository();
        $this->repository_rulegroups = new RuleRulegroupRepository();
        $this->repository_processlist = new RuleProcessListRepository();
        $this->repository_aliasgroup = new RuleAliasRulegroupRepository();
        $this->repository_filters = new RuleFilterRepository();
        $this->repository_info = new InfoRepository();
        $this->default_path = '/download/rules/';
    }

    /**
     * @param $version
     * @return mixed
     */
    public function makeNewRules($request_args)
    {
        if($request_args['version_custom'] == null)
        {
            $version = explode(".",$request_args['version']);
            $version[2] = (int)$version[2]+1;
            $version = $version[0].'.'.$version[1].'.'.(string)$version[2];
        }
        else
        {
            $version = $request_args['version_custom'];
        }
        
        if (!file_exists('./download/rules')) 
        {
            mkdir('./download/rules', 0777, true);
        }

        $include_fake = isset($request_args['hasFakes']);
        $include_launchers = isset($request_args['hasLaunchers']);

        $process_list = json_encode($this->buildProcessList($include_launchers));
        $buildedProcess = $this->buildFile("." . $this->default_path . 'rule_group_info_' . $version . ".json", $process_list);

        $alias = $this->buildAlias($include_fake, $include_launchers);
        $buildedAlias = $this->buildFile("." . $this->default_path . 'servers_rules_info_' . $version . ".json", $alias);

        $filters = json_encode($this->buildFilters());
        $buildedFilters = $this->buildFile("." . $this->default_path . 'filters_' . $version . ".json", $filters);

        if($buildedProcess && $buildedAlias && $buildedFilters)
        {
            $this->repository->insertNewRule($this->default_path, $version);
            return $version;
        }
        else 
        {
            return return_json(500,'INTERNAL_SERVER_ERROR', 'Could not build!');
        }
    }

    public function return_json($code, $message, $detail = null){
            $response = array('code' => $code, 'message' => $message, 'detail' => $detail);
            return json_encode($response);
    }
    /**
     * @param $version
     * @param $content_process
     * @param $content_alias
     * @param $content_filters
     */
    public function alterVersion($version, $content_process, $content_alias, $content_filters)
    {
        // Update Process
        file_put_contents('.' . $this->default_path . 'rule_group_info_' .$version . ".json", $content_process);
        // Update Alias
        file_put_contents('.' . $this->default_path . 'servers_rules_info_' .$version . ".json", $content_alias);
        // Update Filters
        file_put_contents('.' . $this->default_path . 'filters_' .$version . ".json", $content_filters);
    }

    /**
     * @param $version
     * @return bool|string
     */
    public function getRuleProcessJson($version)
    {
        $rule_path = '.' . $this->default_path . "rule_group_info_$version.json";
        return $this->getFile($rule_path);
    }

    public function  getRuleAliasJson($version)
    {
        $rule_path = '.' . $this->default_path . "servers_rules_info_$version.json";
        return $this->getFile($rule_path);
    }

    public function getRuleFiltersJson($version)
    {
        $rule_path = '.' . $this->default_path . "filters_$version.json";
        return $this->getFile($rule_path);
    }


    protected function getFile($filename)
    {
        return file_get_contents($filename);
    }

    protected function buildFile($filename, $data){
        return file_put_contents($filename, $data);}

    protected function buildBridgeInfo($display_name){
        $relation = $this->repository_info->getLauncherBridgeRelation($display_name);
        if($relation == null)
            return "";
        
        foreach ($relation as $key) {
            $relation2[] = $this->repository_info->bridgeExistByIp($key->ipv4);
        }  

        if($relation2 == null)
            return "";
            
        for($i=0;$i<count($relation2);$i++){
            
            $data[$i]['ipv4'] = $relation2[$i]->ip;
            $data[$i]['tcp_port'] = $relation2[$i]->port_tcp;
            $data[$i]['udp_port'] = $relation2[$i]->port_udp;
        }
        return $data;
    }
    
    protected function buildRulegroupAndAlias($rulegroups){
        if($rulegroups[0] == null)
            return "";
            for($i=0;$i<count($rulegroups);$i++){
            $data[$i] = $rulegroups[$i];
        }
        return $data;
    }

    /**
     * @return array
     */
    protected function buildProcessList($include_launchers) // Gerando agora com alias relacionados, retirar 'related_list' para voltar ao normal
    {
        $processes = $this->repository_processlist->getProcessWithRulegroup();
        $data = [];
            
        foreach ($processes as $process)
        {
            $get_fake =  $this->repository_rulegroups->returnRelationId($process->id_rulegroup);

            if($include_launchers == false && !empty($get_fake)){
                continue;
            }

            if(array_key_exists($process->id_rulegroup,$data))
                array_push($data[$process->id_rulegroup]['process_list'], [
                   'process_id' => $process->rule_process_id,
                   'process_name' => $process->rule_process_name
                ]);
            else {
                $rules_id = explode(', ', $process->related_id);
                $data[$process->id_rulegroup] = [
                    'rule_group_id' => $process->id_rulegroup,
                    'rule_group_name' => $process->rule_rulegroup_name,
                    'rule_rulegroup_fullname' => $process->rule_rulegroup_fullname,
                    'process_list' => [
                        [
                            'process_id' => $process->rule_process_id,
                            'process_name' => $process->rule_process_name
                        ]
                        ],
                    'related_list' => $this->buildRulegroupAndAlias($rules_id)
                ];
            }
        }
        return $data;
    }

    protected function getMainServer($server_info_list, $server_ip)
    {
        foreach ($server_info_list as $current)
        {
            if($current->process_name != "server_new")
            {
                continue;
            }

            if($current->alias_ip != $server_ip)
            {
                continue;
            }

            return $current;
        }

        return null;
    }

    protected function buildAlias($include_fake, $include_launchers)
    {
        $server_info_list = $include_fake 
                    ? $this->repository_aliasgroup->getAliasRuleGroupsConcatWithFake() 
                    : $this->repository_aliasgroup->getAliasRuleGroupsConcat();

        if($server_info_list == null)
        {
            return $this->return_json($response, 200, 'INVALID_REQUEST', 'Query didnt worked so well...');
        }

        $data = [];
        foreach ($server_info_list as $current)
        {
            $fake_alias_info =  $this->repository_info->isLauncherByDisplayName($current->display_name);
            $is_main_server = $current->process_name == "server_new";

            if(empty($fake_alias_info))
            {
                $is_launcher = false;
                $bridge_info = "";
            }
            else
            {
                $is_launcher = $fake_alias_info[0]->launcher;
                if($is_launcher)
                {
                    $bridge_info = $this->buildBridgeInfo($current->display_name);
                }
                else
                {
                    $bridge_info = "";
                }
            }

            $rulegroup_list = explode(',', $current->rule_group_list);
            if($include_launchers == false && $is_launcher == true)
            {
                continue;
            }

            $server_main_id = 0;
            if($current->process_name != "server_new")
            {
                $server_main_info = $this->getMainServer($server_info_list, $current->alias_ip);
                $server_main_id = $server_main_info->alias_id;
            }

            array_push($data, [
                'alias_id' => $current->alias_id,
                'rules_type' => $current->rules_type,
                'country' => $current->country_fullname,
                'country_flag' => $current->country,
                'name' => $current->display_name,
                'launcher_server' => $is_launcher ? 'true' : 'false',
                'bridge_info' => $bridge_info,
                'rule_group_list' => $rulegroup_list,
                'server_main_id' => $server_main_id,
                "others" => $current->others ? "true" : "false"]);
        }

        return json_encode($data);
    }

    protected function buildFilters()
    {
        $filters = $this->repository_filters->getFiltersOnView();
        $data = [];
        foreach ($filters as $filter){
            $path = $this->getPathFromString($filter->path_ocurrence);
            $options = $this->getOptionFromString($filter->options);
            $window = $this->getWindowFromString($filter->window_ocurrence);
            $remote_port_range = $this->getRemotePortRange($filter->range_list_port_remote);
            array_push($data, [
                'identifier' => $filter->identifier,
                'custom' => $filter->custom,
                'bin_name' => $filter->bin_name,
                'redirect_name' => $filter->redirect_name,
                'options' => $options,
                'window_ocurrence' => $window,
                'path_ocurrence' => $path,
                'remote_port_range' => $remote_port_range
            ]);
        }
        return $data;
    }

    private function getRemotePortRange($remote_range_list)
    {
        if($remote_range_list == '')
            return '';
        $remote_range_list = explode(',', $remote_range_list);
        $remote_port = [];

        foreach ($remote_range_list as $range)
        {
            $proto_minmax = explode(':', $range);
            $min_max = explode('-', $proto_minmax[1]);
            $min = $min_max[0];
            $max = $min_max[1];
            $protocol = $proto_minmax[0];

            $exist = false;
            foreach ($remote_port as &$proto){
                if($proto['protocol'] == $protocol){
                    $exist = true;
                    array_push($proto['range_list'], [
                        'min' => $min,
                        'max' => $max
                    ]);
                }
            }
            if(!$exist) {
                array_push($remote_port, [
                    'protocol' => $protocol,
                    'range_list' => [
                        [
                            'min' => $min,
                            'max' => $max
                        ]
                    ]
                ]);
            }
        }
        return $remote_port;
    }

    private function getOptionFromString($option_str)
    {
        if($option_str == '')
            return '';

        $option_str = explode(',', $option_str);
        $option = [];
        foreach ($option_str as $op)
        {
            $exp = explode(':', $op);
            $option[$exp[0]] = $exp[1];
        }
        return $option;
    }

    private function getPathFromString($path_str)
    {
        if($path_str == '')
            return '';

        return explode(',', $path_str);
    }

    private function getWindowFromString($window_str)
    {
        if($window_str == '')
            return '';

        return explode(',', $window_str);
    }
}