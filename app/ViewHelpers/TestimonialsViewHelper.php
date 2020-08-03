<?php

namespace NPDashboard\ViewHelpers;

use NPDashboard\Repositories\TestimonialsRepository;

class TestimonialsViewHelper
{
    /**
     * @var TestimonialsRepository
     */
    private $repository;

    /**
     * TestimonialsViewHelper constructor.
     * @param TestimonialsRepository $repository
     */
    public function __construct(TestimonialsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return int
     */
    public function todayTestimonials()
    {
        return $this->repository->createdTestimonialsCountByDay();
    }

    /**
     * @return int
     */
    public function pendingTestimonials()
    {
        return $this->repository
            ->pendingApproveCount();
    }
}