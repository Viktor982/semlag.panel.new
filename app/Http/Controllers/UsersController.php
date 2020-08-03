<?php

namespace NPDashboard\Http\Controllers;

use NPCore\Http\Request;
use NPDashboard\Http\ACL\UserAdministrativeRoleValidation;
use NPDashboard\Http\ACL\UserReadLanguageRoleValidation;
use NPDashboard\Repositories\CustomersRepository;
use NPDashboard\Repositories\GroupsRepository;
use NPDashboard\Repositories\RolesRepository;
use NPDashboard\Repositories\UsersRepository;
use NPDashboard\Services\GeolocationService;


class UsersController extends Controller
{
    /**
     * @param UsersRepository $repository
     * @param UserAdministrativeRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function all(UsersRepository $repository, UserAdministrativeRoleValidation $role)
    {
        $users = $repository->usersTable();
        return view('pages.users.all', ['users' => $users]);
    }

    /**
     * @param UserAdministrativeRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function create(UserAdministrativeRoleValidation $role)
    {
        return view('pages.users.create');
    }

    /**
     * @param UsersRepository $repository
     * @param UserAdministrativeRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(UsersRepository $repository, UserAdministrativeRoleValidation $role)
    {
        $args = $this->request->all();
        $user = $repository->find($args['id']);
        return view('pages.users.edit', ['user' => $user]);
    }

    /**
     * @param UsersRepository $repository
     * @param UserAdministrativeRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function store(UsersRepository $repository, UserAdministrativeRoleValidation $role)
    {
        $args = $this->request->all();
        $repository->create([
            'username' => $args['username'],
            'password' => md5($args['password'])
        ]);

        return redirect('users.all');
    }

    /**
     * @param UsersRepository $repository
     * @param UserAdministrativeRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function update(UsersRepository $repository, UserAdministrativeRoleValidation $role)
    {
        $args = $this->request->all();
        $repository->find($args['id'])->update([
            'password' => md5($args['password'])
        ]);

        return redirect('users.all');
    }

    /**
     * @param UsersRepository $usersRepository
     * @param GroupsRepository $groupsRepository
     * @param RolesRepository $rolesRepository
     * @param UserAdministrativeRoleValidation $role
     * @return \Illuminate\Contracts\View\View
     */
    public function editRoles(UsersRepository $usersRepository, GroupsRepository $groupsRepository, RolesRepository $rolesRepository, UserAdministrativeRoleValidation $role)
    {
        $user = $usersRepository->find($this->request->all()['id']);
        $userRoles = $user->roles();
        $userGroups = $user->groups->map(function ($g) {
            return $g->id;
        })->toArray();
        $groups = $groupsRepository->groupsTable();
        $roles = $rolesRepository->rolesTable();

        return view('pages.users.edit-role', [
            'user' => $user,
            'groups' => $groups,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'userGroups' => $userGroups,
        ]);
    }

    /**
     * @param UsersRepository $usersRepository
     * @param UserAdministrativeRoleValidation $role
     * @return \NPCore\Http\Redirect
     */
    public function updateRoles(UsersRepository $usersRepository, UserAdministrativeRoleValidation $role)
    {
        foreach ($this->request->inputs() as $input => $value) {
            if (strpos($input, 'role_') !== false) {
                $roles[str_replace('role_', '', $input)] = $value;
            } elseif (strpos($input, 'group_') !== false) {
                $groups[str_replace('group_', '', $input)] = $value;
            }
        }
        $groups = collect($groups)->filter(function ($value) {
            return $value > 0;
        })->toArray();
        $roles = collect($roles)->filter(function ($value) {
            return $value > 0;
        })->toArray();
        $user = $usersRepository->find($this->request->routeArgs()['id']);
        $user->groups()->sync(array_keys($groups));
        $user->userRoles()->sync(array_keys($roles));
        return redirect('users.edit-roles', ['id' => $user->id]);
    }

}
