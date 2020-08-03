<?php

namespace NPDashboard\Http\Controllers;

use Carbon\Carbon;
use NPDashboard\Http\ACL\UserCreateFaqRoleValidation;
use NPDashboard\Http\ACL\UserEditFaqRoleValidation;
use NPDashboard\Http\ACL\UserListFaqsRoleValidation;
use NPDashboard\Repositories\FaqsRepository;
use NPDashboard\Repositories\LanguageRepository;

class FaqsController extends Controller
{

    /**
     * @param FaqsRepository $repository
     * @param UserListFaqsRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function all(FaqsRepository $repository, UserListFaqsRoleValidation $role)
    {
        $faqs = $repository->faqsTable();
        return view('pages.faqs.all', ['faqs' => $faqs]);
    }

    /**
     * @param LanguageRepository $repository
     * @param UserCreateFaqRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function create(LanguageRepository $repository, UserCreateFaqRoleValidation $role)
    {
        $langs = $repository->all();
        return view('pages.faqs.create', ['langs' => $langs]);
    }

    /**
     * @param FaqsRepository $repository
     * @param LanguageRepository $languageRepository
     * @param UserEditFaqRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(FaqsRepository $repository, LanguageRepository $languageRepository, UserEditFaqRoleValidation $role)
    {
        $id = $this->request->all()['id'];
        $faqs = $repository->find($id)->brotherFaqs()->take(3)->get();
        $langs = $languageRepository->all();
        return view('pages.faqs.edit', ['faqs' => $faqs, 'langs' => $langs]);
    }

    /**
     * @param FaqsRepository $repository
     * @param UserCreateFaqRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function store(FaqsRepository $repository, UserCreateFaqRoleValidation $role)
    {
        $args = $this->request->all();
        $timestamp = (Carbon::now()->timestamp);
        for ($i = 0; $i < count($args['question']); $i++) {
            $repository->create([
                'question' => $args['question'][$i],
                'answer' => $args['answer'][$i],
                'order' => $args['order'][$i],
                'lang' => $args['lang'][$i],
                'multiple_question_id' => $timestamp
            ]);
        }

        return redirect('site.faqs');
    }

    /**
     * @param FaqsRepository $repository
     * @param UserEditFaqRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function update(FaqsRepository $repository, UserEditFaqRoleValidation $role)
    {
        $args = $this->request->except(['id']);
        $id = $this->request->all()['id'];
        $repository->resetMutiplesIds($id);
        for ($i = 0; $i < count($args['question']); $i++) {
            $repository->create([
                'question' => $args['question'][$i],
                'answer' => $args['answer'][$i],
                'order' => $args['order'][$i],
                'lang' => $args['lang'][$i],
                'multiple_question_id' => $id
            ]);
        }
        return redirect('site.faqs');
    }

    /**
     * @param FaqsRepository $repository
     * @param UserEditFaqRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function updateOrder(FaqsRepository $repository, UserEditFaqRoleValidation $role)
    {
        $args = $this->request->except(['id']);
        $id = $this->request->all()['id'];
        $repository->find($id)->update($args);
        return redirect('site.faqs');
    }

    /**
     * @param FaqsRepository $repository
     * @param UserEditFaqRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function delete(FaqsRepository $repository, UserEditFaqRoleValidation $role)
    {
        $id = $this->request->all()['id'];
        $repository->find($id)->delete();
        return redirect('site.faqs');
    }
}