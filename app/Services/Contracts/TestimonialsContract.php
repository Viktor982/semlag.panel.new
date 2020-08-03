<?php

namespace NPDashboard\Services\Contracts;

use NPDashboard\Models\Testimonial;
use NPDashboard\Repositories\TestimonialsRepository;

interface TestimonialsContract
{
    /**
     * @param Testimonial $testimonial
     * @param $language
     * @return mixed
     */
    public function updateLanguage(Testimonial $testimonial, $language);

    /**
     * @param Testimonial $testimonial
     * @param $status
     * @return mixed
     */
    public function updateStatus(Testimonial $testimonial, $status);

    /**
     * @param Testimonial $testimonial
     * @param $status
     * @return mixed
     */
    public function updateStatusLandingPage(Testimonial $testimonial, $status);
}