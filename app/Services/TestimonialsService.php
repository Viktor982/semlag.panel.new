<?php

namespace NPDashboard\Services;

use NPDashboard\Models\Testimonial;
use NPDashboard\Repositories\TestimonialsRepository;
use NPDashboard\Services\Contracts\TestimonialsContract;

class TestimonialsService implements TestimonialsContract
{
    /**
     * @var TestimonialsRepository
     */
    private $repository;

    /**
     * TestimonialsService constructor.
     */
    public function __construct()
    {
        $this->repository = new TestimonialsRepository();
    }

    /**
     * @param Testimonial $testimonial
     * @param $language
     * @return bool
     */
    public function updateLanguage(Testimonial $testimonial, $language)
    {
        $update = $testimonial->update(['lang' => $language]);
        return $update;
    }

    /**
     * @param Testimonial $testimonial
     * @param $status
     * @return bool
     */
    public function updateStatus(Testimonial $testimonial, $status)
    {
        $update = $testimonial->update(['approved' => $status]);
        return $update;
    }

    /**
     * @param Testimonial $testimonial
     * @param $status
     * @return bool
     */
    public function updateStatusLandingPage(Testimonial $testimonial, $status)
    {
        $update = $testimonial->update(['landing' => $status]);
        return $update;
    }
}