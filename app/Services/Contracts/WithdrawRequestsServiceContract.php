<?php

namespace NPDashboard\Services\Contracts;

use NPDashboard\Models\User;
use NPDashboard\Models\WithdrawRequest;

interface WithdrawRequestsServiceContract
{
    /**
     * @param WithdrawRequest $withdraw
     * @param $status
     * @return mixed
     */
    public function updateStatus(WithdrawRequest $withdraw, $status);

    /**
     * @param WithdrawRequest $withdraw
     * @param User $user
     * @param $message
     * @return mixed
     */
    public function addQuote(WithdrawRequest $withdraw, User $user, $message);
}