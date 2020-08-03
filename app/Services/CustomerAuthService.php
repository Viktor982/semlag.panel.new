<?php

namespace NPDashboard\Services;

use NPDashboard\Models\Customer;
use NPDashboard\Services\Traits\HttpClient;
use NPDashboard\Services\Contracts\CustomerAuthServiceContract;

class CustomerAuthService implements CustomerAuthServiceContract
{
    const ENDPOINT = 'https://www.nptunnel.com/api/login/user/';

    use HttpClient;

    /**
     * @param Customer $customer
     * @return string
     */
    public function getCustomerAuthKey(Customer $customer)
    {
        return $this->signInByApi($customer->id);
    }

    /**
     * @param $id
     * @return string
     */
    private function signInByApi($id)
    {
        $request = $this->getNpApiClient()->get(self::ENDPOINT . $id);
        $response = $request->getBody();
        return $response->__toString();
    }

    /**
     * @param $id
     * @return string
     */
    public function reconfirmEmail($id)
    {
        $request = $this->getNpApiClient()->post('https://www.nptunnel.com/api/user/reconfirm', [
            'form_params' => [
                'user' => $id
            ]
        ]);
        $response = $request->getBody();
        return $response->__toString();
    }

    /**
     * @param $name
     * @param $email
     * @param $password
     * @return mixed
     */
    public function createCustomer($name, $email, $password)
    {
        return Customer::create([
            'nome' => $name,
            'usuario' => $email,
            'senha' => md5($password),
            'ref' => str_random(mt_rand(7, 10))
        ]);
    }

    /**
     * @param $name
     * @param $email
     * @param $password
     * @return mixed
     */
    public function createCustomerWithArgs(array $args)
    {
        return Customer::create($args);
    }
}