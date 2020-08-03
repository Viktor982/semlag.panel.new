<?php

namespace NPDashboard\Http\Controllers;


use NPDashboard\Repositories\GroupsRepository;
use NPDashboard\Repositories\RolesRepository;

class GroupsController extends Controller
{
    /**
     * @param GroupsRepository $repository
     * @return \Illuminate\Contracts\View\View
     */
    public function all(GroupsRepository $repository)
    {
        $groups = $repository->groupsTable();
        return view('pages.groups.all', ['groups' => $groups]);
    }

    /**
     * @param GroupsRepository $repository
     * @return \NPCore\Http\Redirect
     */
    public function create(GroupsRepository $repository)
    {
        $groupName = $this->request->all()['group-name'];

        $group = $repository->create(['name' => $groupName]);

        return redirect('groups.edit', ['id' => $group->id]);
    }

    /**
     * @param GroupsRepository $groupsRepository
     * @param RolesRepository $rolesRepository
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(GroupsRepository $groupsRepository, RolesRepository $rolesRepository)
    {
        $groupId = $this->request->all()['id'];

        $group = $groupsRepository->find($groupId);
        $groupRoles = $group->roles();
        $roles = $rolesRepository->rolesTable();

        return view('pages.groups.edit', ['group' => $group, 'roles' => $roles, 'groupRoles' => $groupRoles]);
    }

    /**
     * @param GroupsRepository $groupsRepository
     * @return \NPCore\Http\Redirect
     */
    public function update(GroupsRepository $groupsRepository)
    {
        $group = $groupsRepository->find($this->request->routeArgs()['id']);
        $roles = [];
        foreach ($this->request->inputs() as $input => $value) {
            if (strpos($input, 'role_') !== false && $value == 1) {
                $roles[] = str_replace('role_', '', $input);
            }
        }
        $group->groupRoles()->sync($roles);
        return redirect('groups.edit', ['id' => $this->request->routeArgs()['id']]);
    }
}