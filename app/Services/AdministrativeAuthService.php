<?php

namespace NPDashboard\Services;

use NPDashboard\Models\User;
use NPDashboard\Repositories\UsersRepository;

class AdministrativeAuthService
{
    /**
     * @var UsersRepository
     */
    private $repository;

    /**
     * AdministrativeAuthService constructor.
     */
    public function __construct()
    {
        $this->repository = new UsersRepository();
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function attempt($username, $password)
    {
        $find = $this->repository->findByUserAndPassword($username, $password);

        if (!$find->count())
            return false;

        return $this->authenticateWithModel($find->first());
    }

    /**
     * @param User $user
     * @return bool
     */
    public function authenticateWithModel(User $user)
    {
        \Session::put('user', $user);
        return true;
    }

    /**
     * @return bool
     */
    public function deauthenticate()
    {
        \Session::flush();
        return true;
    }
}