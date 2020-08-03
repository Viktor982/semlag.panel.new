<?php

namespace NPDashboard\Services\Contracts;

use NPDashboard\Models\Customer;

interface CustomerAuthServiceContract
{
    /**
     * @param Customer $customer
     */
    public function getCustomerAuthKey(Customer $customer);

    /**
     * @param $name
     * @param $email
     * @param $password
     * @return mixed
     */
    public function createCustomer($name, $email, $password);
}