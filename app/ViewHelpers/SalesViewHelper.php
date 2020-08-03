<?php

namespace NPDashboard\ViewHelpers;

use NPDashboard\Repositories\SalesRepository;

class SalesViewHelper
{
    /**
     * @var SalesRepository
     */
    private $repository;

    /**
     * SalesViewHelper constructor.
     * @param SalesRepository $repository
     */
    public function __construct(SalesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param bool $approved
     * @return int
     */
    public function todaySales($approved = false)
    {
        return $this->repository->dailySales($approved);
    }
}