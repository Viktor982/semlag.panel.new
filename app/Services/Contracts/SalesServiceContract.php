<?php

namespace NPDashboard\Services\Contracts;

use NPDashboard\Models\Sale;

interface SalesServiceContract
{
    /**
     * @param Sale $sale
     * @param $status
     * @return mixed
     */
    public function updateStatus(Sale $sale, $status);

    /**
     * @param Sale $sale
     * @return mixed
     */
    public function removeSaleDays(Sale $sale);

    /**
     * @param Sale $sale
     * @return mixed
     */
    public function addQuote(Sale $sale);

    /**
     * @param Sale $sale
     * @return mixed
     */
    public function getStatusChangeHistory(Sale $sale);
}