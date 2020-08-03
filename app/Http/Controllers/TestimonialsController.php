<?php

namespace NPDashboard\Http\Controllers;

use NPDashboard\Http\ACL\UserCreateTestimonialFakeRoleValidation;
use NPDashboard\Http\ACL\UserEditTestimonialRoleValidation;
use NPDashboard\Http\ACL\UserListSchedulesTestimonialsFake;
use NPDashboard\Http\ACL\UserListTestimonialFakeRoleValidation;
use NPDashboard\Http\ACL\UserListTestimonialRoleValidation;
use NPDashboard\Http\Controllers\Controller;
use NPDashboard\Models\ScheduleTestimonial;
use NPDashboard\Repositories\TestimonialsRepository;
use NPDashboard\Repositories\GamesRepository;
use NPDashboard\Services\TestimonialsService;
use NPDashboard\Repositories\LanguagesRepository;
use NPDashboard\Repositories\CustomersRepository;


class TestimonialsController extends Controller
{
    /**
     * @param TestimonialsRepository $repository
     * @param GamesRepository $gamesRepository
     * @param UserListTestimonialRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function all(TestimonialsRepository $repository, GamesRepository $gamesRepository, UserListTestimonialRoleValidation $role)
    {
        $games = $gamesRepository->games();
        $testimonials = $repository->testimonialsTable();
        return view('pages.testimonials.all', [
            'testimonials' => $testimonials,
            'games' => $games
        ]);
    }

    /**
     * @param TestimonialsRepository $repository
     * @param GamesRepository $gamesRepository
     * @param UserListTestimonialRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function approved(TestimonialsRepository $repository, GamesRepository $gamesRepository, UserListTestimonialRoleValidation $role)
    {
        $testimonials = $repository->approvedTestimonialsTable();
        $games = $gamesRepository->games();
        return view('pages.testimonials.all', ['testimonials' => $testimonials, 'games' => $games]);
    }

    /**
     * @param TestimonialsRepository $repository
     * @param GamesRepository $gamesRepository
     * @param UserListTestimonialRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function pending(TestimonialsRepository $repository, GamesRepository $gamesRepository, UserListTestimonialRoleValidation $role)
    {
        $games = $gamesRepository->games();
        $testimonials = $repository->pendingTestimonialsTable();
        return view('pages.testimonials.all', ['testimonials' => $testimonials, 'games' => $games]);
    }

    /**
     * @param TestimonialsRepository $repository
     * @param GamesRepository $gamesRepository
     * @param UserListTestimonialRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function disapproved(TestimonialsRepository $repository, GamesRepository $gamesRepository, UserListTestimonialRoleValidation $role)
    {
        $games = $gamesRepository->games();
        $testimonials = $repository->disapprovedTestimonialsTable();
        return view('pages.testimonials.all', ['testimonials' => $testimonials, 'games' => $games]);
    }

    /**
     * @param TestimonialsRepository $repository
     * @param TestimonialsService $service
     * @param UserEditTestimonialRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function updateStatus(TestimonialsRepository $repository, TestimonialsService $service, UserEditTestimonialRoleValidation $role)
    {
        $args = $this->request->all();
        $testimonial = $repository->find($args['testimonial-id']);
        $service->updateStatus($testimonial, $args['status']);

        np_log('updateStatus', [
            'type' => "Depoimento",
            'value_type' => "Status",
            'id' => $testimonial->id
        ]);

        return redirect('testimonials');
    }

    /**
     * @param TestimonialsRepository $repository
     * @param TestimonialsService $service
     * @param UserEditTestimonialRoleValidation $role
     */
    public function updateStatusLandingPage(TestimonialsRepository $repository, TestimonialsService $service, UserEditTestimonialRoleValidation $role)
    {
        $id = $this->request->all()['id'];
        $status = (int)$this->request->all()['status'];
        $testimonial = $repository->find($id);
        $service->updateStatusLandingPage($testimonial, $status);

        np_log('updateStatus', [
            'type' => "Depoimento",
            'value_type' => "Status da Landing Page",
            'id' => $testimonial->id
        ]);
    }

    /**
     * @param TestimonialsRepository $repository
     * @param TestimonialsService $service
     * @param UserEditTestimonialRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function updateLanguage(TestimonialsRepository $repository, TestimonialsService $service, UserEditTestimonialRoleValidation $role)
    {
        $args = $this->request->all();
        $testimonial = $repository->find($args['testimonial-id']);
        $service->updateLanguage($testimonial, $args['language']);
        np_log('updateStatus', [
            'type' => "Depoimento",
            'value_type' => "Idioma",
            'id' => $testimonial->id
        ]);
        return redirect('testimonials');
    }

    /**
     * @param UserListTestimonialFakeRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function fakeAll(UserListTestimonialFakeRoleValidation $role)
    {
        return view('pages.testimonials.fakes.all');
    }

    /**
     * @param GamesRepository $games
     * @param LanguagesRepository $languages
     * @param CustomersRepository $customers
     * @param UserCreateTestimonialFakeRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function fakeCreate(GamesRepository $games, LanguagesRepository $languages, CustomersRepository $customers, UserCreateTestimonialFakeRoleValidation $role)
    {
        $game = $games->games();
        $language = $languages->getLanguages();
        $customer = $customers->fakeSortableCustomer()->random();
        return view('pages.testimonials.fakes.create', ['games' => $game, 'languages' => $language, 'customer' => $customer]);
    }

    /**
     * @param TestimonialsRepository $repository
     * @return \NPCore\Http\Redirect
     */
    public function fakeStore(TestimonialsRepository $repository, UserCreateTestimonialFakeRoleValidation $role)
    {
        $input = $this->request->all()['launch'];
        if ($input == 1) {
            $repository->create($this->request->all());
        } else {
            $repository->createSchedule($this->request->all());
        }
        np_log('store', [
            'type' => "Depoimento Fake",
            'id' => ""
        ]);
        return redirect('testimonials');
    }

    /**
     * @param TestimonialsRepository $repository
     * @param UserListSchedulesTestimonialsFake $role
     * @return \Illuminate\Contracts\View\View
     */
    public function fakeSchedules(TestimonialsRepository $repository, UserListSchedulesTestimonialsFake $role)
    {
        $schedules = $repository->schedulesTable();
        return view('pages.testimonials.fakes.schedules', ['schedules' => $schedules]);
    }

    /**
     * @param TestimonialsRepository $repository
     * @param UserListSchedulesTestimonialsFake $role
     * @return \NPCore\Http\Redirect
     */
    public function deleteSchedule(TestimonialsRepository $repository, UserListSchedulesTestimonialsFake $role)
    {
        $id = $this->request->all()['id'];
        $schedule = $repository->getSchedule()->find($id);
        $schedule->delete();
        return redirect('testimonials.fake-schedules');
    }

    /**
     * @return \NPCore\Http\Redirect
     */
    public function search()
    {
        $args = $this->request->all();
        $method = base64_encode($args['method']);
        $value = base64_encode($args['value']);
        return redirect('testimonials.search.result',['method' => $method, 'value' => $value ]);
    }

    /**
     * @param TestimonialsRepository $repository
     * @param GamesRepository $gamesRepository
     * @return \Illuminate\Contracts\View\View
     */
    public function searchResult(TestimonialsRepository $repository, GamesRepository $gamesRepository)
    {
        $args = $this->request->all();
        $games = $gamesRepository->games();
        $method = base64_decode($args['method']);
        $value = base64_decode($args['value']);
        $search = $repository->search($method, $value);
        return view('pages.testimonials.all', ['testimonials' => $search, 'games' => $games]);
    }
}