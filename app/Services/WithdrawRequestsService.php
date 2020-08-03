<?php

namespace NPDashboard\Services;

use NPDashboard\Services\Contracts\WithdrawRequestsServiceContract;
use NPDashboard\Models\User;
use NPDashboard\Models\WithdrawRequest;

class WithdrawRequestsService implements WithdrawRequestsServiceContract
{

    public function __construct()
    {

    }

    /**
     * @param WithdrawRequest $withdraw
     * @param $status
     * @return WithdrawRequest
     */
    public function updateStatus(WithdrawRequest $withdraw, $status)
    {

        $withdraw->status_code = $status;
        $withdraw->save();
        return $withdraw;
    }

    public function addQuote(WithdrawRequest $withdraw, User $user, $message)
    {
        // TODO: Implement addQuote() method.
    }
}