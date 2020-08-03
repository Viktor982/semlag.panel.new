<?php


namespace NPDashboard\Http\Controllers\API;

use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Repositories\CustomersRepository;
use NPDashboard\Services\Infrastructure\Customer;

class DebuggerController extends Controller
{
    public function customer(CustomersRepository $customersRepository, Customer $service)
    {
        $id = $this->request->only(['id'])['id'];
        $customer = $customersRepository->find($id);

        if(! $customer)
            return ['online' => false];

        return $service->live($customer);
    }
}