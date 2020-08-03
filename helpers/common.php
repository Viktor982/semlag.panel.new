<?php


if(! function_exists('config')){
    /**
     * @return \NPCore\Config\ConfigArray
     */
    function config()
    {
        return \NPCore\Config\Config::getInstance();
    }
}

if(! function_exists('env')){
    /**
     * @param $key
     * @param null $default
     * @return array|false|null|string
     */
    function env($key, $default = null)
    {
        $attempt = getenv($key);
        return ($attempt === false) ? $default : $attempt;
    }
}

if(! function_exists('view')){
    /**
     * @param $view
     * @param array $data
     * @return \Illuminate\Contracts\View\View
     */
    function view($view, array $data = [])
    {
        return \NPCore\AppCapsule::view()
            ->make($view, $data);
    }
}

if(! function_exists('plan')){
    /**
     * @param $id
     * @return mixed
     */
    function plan($id)
    {
        return Cache::remember('plan-'.$id, 3600, function() use($id){
           $plan = (new \NPDashboard\Repositories\PlansRepository)->find($id);
           return ($plan) ? $plan->nome : null;
        });

    }
}


if(! function_exists('affected_plans')){
    /**
     * @param $id
     * @return mixed
     */
    function affected_plans($ids)
    {
        //  Destrinchar a lista
        $plans = collect(explode(',', $ids ));
        // Consultar um a um
        $plans = $plans->map(function ($plan){
             return plan($plan);
        })->filter(function ($value){
            return ! is_null($value);
        })->implode(', ');

        return $plans;
    }
}


if(! function_exists('affiliate_balance')){
    /**
     * @param $value
     * @return mixed
     */
    function affiliate_balance($value)
    {
       $balance = collect($value);
       $balance = $balance->filter(function ($balances){
           return ! is_null($balances);
       });

       return var_export($balance);
    }
}



if(! function_exists('gateway')){
    /**
     * @param $id
     * @return mixed
     */
    function gateway($id)
    {
        return Cache::remember('gateway'.$id, 60*24*365, function () use($id){
           $gateway = (new \NPDashboard\Repositories\GatewaysRepository)->findByMethodId($id);
           return ($gateway) ? $gateway->name :null;
        });
    }
}

if(! function_exists('currency')){
    /**
     * @param $id
     * @return mixed
     */
    function currency($id)
    {
        return Cache::remember('currency'.$id, 3600, function () use($id){
            $currency = (new \NPDashboard\Repositories\CurrencyRepository)->find($id);
            return ($currency) ? $currency->code :null;
        });
    }
}

if(! function_exists('sale_status')){
    /**
     * @param $statusCode
     * @return mixed|string
     */
    function sale_status($statusCode)
    {
            $enum = [
                0 => 'Nulo',
                1 => 'Em espera',
                2 => 'Aprovado',
                3 => 'Devolvido',
                4 => 'Cancelado'
            ];
            return (key_exists($statusCode,$enum)) ? $enum[$statusCode] : 'DESCONHECIDO';
    }
}

if(! function_exists('customer_status')){
    /**
     * @param $statusCode
     * @return mixed|string
     */
    function customer_status($status)
    {
        $enum = [
            0 => 'Sem status',
            1 => 'Ativado',
            2 => 'Expirará em breve',
            3 => 'Expirado',
            4 => 'Desativado'
        ];
        return (key_exists($status,$enum)) ? $enum[$status] : 'DESCONHECIDO';
    }
}

if(! function_exists('brDate')){
    /**
     * @param $date
     * @return string
     */
    function brDate($date)
    {
        $date = (new \Carbon\Carbon($date))->format("d/m/y H:i:s");
        return $date;
    }
}

if(! function_exists('subscription_status')){
    /**
     * @param $statusCode
     * @return mixed|string
     */
    function subscription_status($statusCode)
    {
        $enum = [
            1 => 'Recebida',
            2 => 'Ativa',
            3 => 'Cancelada'
        ];
        return (key_exists($statusCode, $enum)) ? $enum[$statusCode] : 'DESCONHECIDO';
    }
}

if(! function_exists('withdraw_request_status')){
    /**
     * @param $statusCode
     * @return mixed|string
     */
    function withdraw_request_status($statusCode)
    {
        $enum = [
            1 => 'Recebido',
            2 => 'Realizado',
            3 => 'Cancelado'
        ];
        return (key_exists($statusCode, $enum)) ? $enum[$statusCode] : 'DESCONHECIDO';
    }
}



if(! function_exists('withdraw_request_type')){
    /**
     * @param $statusCode
     * @return mixed|string
     */
    function withdraw_request_type($statusCode)
    {
        $enum = [
            1 => 'PayPal',
            2 => 'PagSeguro',
            3 => 'Conta Bancaria'
        ];
        return (key_exists($statusCode, $enum)) ? $enum[$statusCode] : 'DESCONHECIDO';
    }
}

if(! function_exists('withdraw_request_currency')){
    /**
     * @param $statusCode
     * @return mixed|string
     */
    function withdraw_request_currency($statusCode)
    {
        $enum = [
            1 => 'USD', // PayPal
            2 => 'BRL', // PagSeguro
            3 => 'BRL'  // Conta Bancaria
        ];
        return (key_exists($statusCode, $enum)) ? $enum[$statusCode] : 'DESCONHECIDO';
    }
}

if(! function_exists('npcoin_valuation')){
    /**
     * @param $code
     * @return mixed
     */
    function npcoin_valuation($code)
    {
        return Cache::remember('valuation_'.$code, 5, function () use($code){
            $npCoinValuation = (new \NPDashboard\Repositories\NPCoinValuationRepository())->findByCode($code);
            return ($npCoinValuation) ? $npCoinValuation->value :null;
        });

    }
}

if(! function_exists('format_currency')){
    /**
     * @param $value
     * @return mixed|string
     */
    function format_currency($value)
    {
        return number_format($value , 2, '.', ',');
    }
}

if(! function_exists('convert_npcoins')){
    /**
     * @param $type
     * @param $value
     * @return mixed|string
     */
    function convert_npcoins($type, $value)
    {
        $currencyCode = withdraw_request_currency($type);

        return format_currency(npcoin_valuation($currencyCode) * $value);
    }
}

if(! function_exists('withdraw_request_status_color')){
    /**
     * @param $type
     * @param $value
     * @return mixed|string
     */
    function withdraw_request_status_color($status)
    {
        $enum = [
            1 => 'azure',
            2 => 'green',
            3 => 'red'
        ];
        return (key_exists($status, $enum)) ? $enum[$status] : '';
    }
}

if(! function_exists('fullUrl')) {
    /**
     * @return string
     */
    function fullUrl()
    {
        $request = \NPCore\AppCapsule::request();
        return $request->getScheme() . '://' . $request->getHttpHost() . $request->getPathInfo();
    }
}

if(! function_exists('stringToColorCode')) {
    /**
     * @param $str
     * @return string
     */
    function stringToColorCode($str)
    {
        $code = dechex(crc32($str));
        $code = substr($code, 0, 6);
        return $code;
    }
}

if(! function_exists('npconfig')) {
    /**
     * @param $key
     * @return mixed|null
     */
    function npconfig($key)
    {
        $npconfig = (new \NPDashboard\Repositories\NPConfigRepository())->findByKey($key);
        return ($npconfig) ? $npconfig->value : null;
    }
}

if(! function_exists('coupon')){
    /**
     * @param string $string
     * @return string
     */
    function coupon($string = 'xxxxxxxxxxxxxxxxxxxx')
    {
        return strtoupper(implode("-", str_split($string, 5)));
    }
}

if(! function_exists('getLang')){
    /**
     * @param $id
     * @return mixed
     */
    function getLang($id)
    {
        return Cache::remember('lang_'.$id, 5, function () use($id){
            $lang = (new \NPDashboard\Repositories\LanguageRepository())->getModel()->where('id', $id)->first();
            return ($lang) ? $lang['name'] : null;
        });
    }
}

if(! function_exists('customer')) {
    /**
     * @param $id
     */
    function customer($id)
    {

    }
}