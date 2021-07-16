<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DataProviders\AdminRoleForm\AdminRoleForm;
use App\Services\FormProcessors\AdminRole\AdminRoleFormProcessor;
use App\Services\Repositories\AdminRole\AdminRoleRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminRolesController extends Controller
{

    public const  ROUTE_INDEX = 'cc.admin-roles.index';
    public const  ROUTE_CREATE = 'cc.admin-roles.create';
    public const  ROUTE_STORE = 'cc.admin-roles.store';
    public const  ROUTE_EDIT = 'cc.admin-roles.edit';
    public const  ROUTE_UPDATE = 'cc.admin-roles.update';
    public const  ROUTE_DESTROY = 'cc.admin-roles.destroy';

    public function __construct(
        private AdminRoleRepository $adminRoleRepository,
        private AdminRoleFormProcessor $adminRoleFormProcessor,
        private AdminRoleForm $adminRoleForm
    ){}


    public function index()
    {
        return \View('admin.admin_roles.index')->with('role_list', $this->getRoleList());
    }


    public function create()
    {
        return \View('admin.admin_roles.create')
            ->with($this->adminRoleForm->provideData($this->adminRoleRepository->newInstance(), request()->old()))
            ->with('role_list', $this->getRoleList());
    }


    public function store()
    {
        $createdRole = $this->adminRoleFormProcessor->create(request()->except('redirect_to'));
        if ($createdRole === null)
            return redirect()->route(self::ROUTE_CREATE)->withErrors($this->adminRoleFormProcessor->errors())->withInput();

        if (request()->get('redirect_to') === 'index') {
            $redirect = redirect()->route(self::ROUTE_INDEX);
        } else {
            $redirect = redirect()->route(self::ROUTE_EDIT, [$createdRole->id]);
        }

        return $redirect->with('alert_success', "Роль {$createdRole->name} создана");
    }


    public function edit($id)
    {
        $role = $this->adminRoleRepository->find($id);
        if ($role === null)
            \App::abort(404, 'Resource not found');

        $this->authorize('change-admin-role', $role);

        return \View('admin.admin_roles.edit')
            ->with($this->adminRoleForm->provideData($role, request()->old()))
            ->with('role_list', $this->getRoleList());
    }


    public function update($id)
    {
        $role = $this->adminRoleRepository->find($id);
        if ($role === null)
            \App::abort(404, 'Resource not found');

        $this->authorize('change-admin-role', $role);

        $updateSuccess = $this->adminRoleFormProcessor->update($role, request()->except('redirect_to'));
        if (!$updateSuccess)
            return \Redirect::route(self::ROUTE_EDIT, [$id])->withErrors($this->adminRoleFormProcessor->errors())->withInput();

        if (request()->get('redirect_to') === 'index') {
            $redirect = redirect()->route(self::ROUTE_INDEX);
        } else {
            $redirect = redirect()->route(self::ROUTE_EDIT, [$id]);
        }

        return $redirect->with('alert_success', "Роль администратора {$role->name} обновлена");
    }

    public function destroy($id)
    {
        $role = $this->adminRoleRepository->find($id);
        if ($role === null)
            \App::abort(404, 'Resource not found');

        $this->authorize('change-admin-role', $role);

        $this->adminRoleRepository->delete($role);
        return \Redirect::route(self::ROUTE_INDEX)
            ->with('alert_success', "Роль администратора {$role->name} удалена");
    }

    public function getRoleList(): Collection
    {
        $user = \Auth::user();

        if ($user === null) {
            $roleList = Collection::make();
        } elseif ($user->super) {
            $roleList = $this->adminRoleRepository->all();
        } else {
            $roleList = $this->adminRoleRepository->allForUser($user);
        }

        return $roleList;
    }
}
