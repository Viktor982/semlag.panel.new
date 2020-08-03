<?php


namespace NPDashboard\Charts;

use NPDashboard\Models\Sale; 
use NPDashboard\Models\RuleGroup;
use NPDashboard\Models\ClientLog;
use NPCore\AppCapsule;

class HistoricalSellsByGame
{

    public function getRulegroupEmail($userEmail){

        $bd_alias = AppCapsule::database()->connection('bd_alias');
        
        /*Email e jogo */
        $secondQ = "SELECT c.ip,c.email, rr.rule_rulegroup_name as rulegroup FROM client_info c 
	    INNER JOIN client_game_info cg ON cg.id_email = c.id 				   			
	    INNER JOIN rules_rulegroup rr ON rr.id_rulegroup = cg.id_rulegroup     
	    WHERE 
        c.email IN ($userEmail)";
        $rulegroup_email = $bd_alias->select($secondQ);
        
        return $rulegroup_email;
    }

    public function getRulegroupToken($utoken){
        $client_log = AppCapsule::database()->connection('client_log');
        
        $tokenRef = join('\',\'', $utoken);
        $tokenRef = '\''.$tokenRef.'\'';
        /*retorna rulegroup e token*/
        $thirdQ = "SELECT t.rulegroup, t.token
	    FROM
        (SELECT
        l.token AS 'token', rulegroup, l.id, c.created_at as 'created_at'
        FROM connection c
        INNER JOIN login l ON c.login_id = l.id
        WHERE l.token IN ($tokenRef) AND c.created_at BETWEEN NOW() - INTERVAL 3 MONTH AND NOW()
        ORDER BY c.id DESC) AS t
	    GROUP BY t.token";
        $rulegroup_token = $client_log->select($thirdQ);
        
        return $rulegroup_token;
    }

    public function gameSellsByPeriod($dateStart, $dateEnd){         
        $default = AppCapsule::database()->connection('default');
        
        $array = array();
        /*  retorna email como usuario, utoken e data*/
        $firstQ = "SELECT DISTINCT concat(DATE(v.date_approved)) as 'date', u.usuario, utoken FROM venda v              
        INNER JOIN usuario u ON u.id = v.usuario_id
        WHERE date(v.date_approved) BETWEEN '$dateStart' AND '$dateEnd'
        AND v.status = 2";
        $email_utoken_data = $default->select($firstQ);

        foreach($email_utoken_data as $key){
            $users[] = $key->usuario;
            $utoken[] = $key->utoken;
        }
        
        $vendasAprovadas = count($email_utoken_data);
        $userEmail = join('\',\'', $users);
        $userEmail = '\''.$userEmail.'\'';

        $rulegroup_email = $this->getRulegroupEmail($userEmail);
        $token = $this->getRulegroupToken($utoken);
       
        foreach($email_utoken_data as $key)
        { 
            $key->rulegroup = "Others";
            foreach($rulegroup_email as $index)
            {
                if($index->email == $key->usuario)
                {
                    $key->rulegroup = $index->rulegroup;
                    $key->ip        = $index->ip;
                }
            }
        }
        foreach($email_utoken_data as $key){
            foreach($token as $index){
                if($index->token == $key->utoken){
                    $key->rulegroup = $index->rulegroup;
                }
            }
        }

        return $email_utoken_data;
    }

    // TODO -> refatorar o código e deixar no modelo desta função!!!!!!!

    function sellsApprovedByDay($dateStart, $dateEnd){
 
        $default = AppCapsule::database()->connection('default');
        $query  = "SELECT DATE(v.date_approved) as 'date', count(*) as 'vendas' FROM venda v
		WHERE v.status = 2
		AND DATE(v.date_approved) BETWEEN '$dateStart' AND '$dateEnd'
		GROUP BY DATE(v.date_approved)
		ORDER BY DATE(v.date_approved) ASC";

        $data = $default->select($query);

        return $data;
    }

}