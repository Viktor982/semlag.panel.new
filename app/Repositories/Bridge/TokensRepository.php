<?php

namespace NPDashboard\Repositories\Bridge;

use Illuminate\Database\Eloquent\Model;
use NPDashboard\Repositories\Repository;
use NPDashboard\Models\Bridge\BridgeToken;

class TokensRepository extends Repository
{
    public function getModel()
    {
        return (new BridgeToken());
    }

    public function registerNewToken(array $options)
    {
        $created = $this->getModel()->create([
            'token' => $options['token'],
            'ip' => $options['ip']]);
        return $created;
    }

    public function getTokens()
    {
        return $this->getModel()->all();
    }

    public function getTokenByIp($ip){
        $current_data = $this->getModel()->where('ip', $ip)->first();
        return $current_data['token'];
    }
    
    public function existToken($token)
    {
        return (bool)$this->getModel()->where('token', $token)->first();
    }

    public function existIp($ip)
    {
        return (bool)$this->getModel()->where('ip', $ip)->first();
    }

    public function deleteToken($token)
    {
        return $this->getModel()->where('token', $token)->delete();
    }
}