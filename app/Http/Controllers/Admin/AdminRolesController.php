<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DataProviders\AdminRoleForm\AdminRoleForm;
use App\Services\FormProcessors\AdminRole\AdminRoleFormProcessor;
use App\Services\Repositories\AdminRole\AdminRoleRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminRolesController extends Controller
{
    private AdminRoleRepository $adminRoleRepository;
    private AdminRoleFormProcessor $adminRoleFormProcessor;
    private AdminRoleForm $adminRoleForm;

    public function __construct(
        AdminRoleRepository $repository,
        AdminRoleFormProcessor $formProcessor,
        AdminRoleForm $adminRoleForm
    ) {
        $this->adminRoleRepository = $repository;
        $this->adminRoleFormProcessor = $formProcessor;
        $this->adminRoleForm = $adminRoleForm;
    }

    public function index()
    {
        return view('admin.admin_roles.index')->with('role_list', $this->getRoleList());
    }

    public function create()
    {
        return view('admin.admin_roles.create')
            ->with($this->adminRoleForm->provideDataFor($this->adminRoleRepository->newInstance(), request()->old()))
            ->with('role_list', $this->getRoleList());
    }

    public function store()
    {
        $createdRole = $this->adminRoleFormProcessor->create(request()->except('redirect_to'));
        if ($createdRole === null) {
            return redirect()->route('cc.admin-roles.create')
                ->withErrors($this->adminRoleFormProcessor->errors())->withInput();
        } else {
            if (request()->get('redirect_to') === 'index') {
                $redirect = redirect()->route('cc.admin-roles.index');
            } else {
                $redirect = redirect()->route('cc.admin-roles.edit', [$createdRole->id]);
            }

            return $redirect->with('alert_success', "Роль {$createdRole->name} создана");
        }
    }

    public function edit($id)
    {
        $role = $this->adminRoleRepository->find($id);
        if ($role === null) {
            \App::abort(404, 'Resource not found');
        }

        $this->authorize('change-admin-role', $role);

        return view('admin.admin_roles.edit')
            ->with($this->adminRoleForm->provideDataFor($role, request()->old()))
            ->with('role_list', $this->getRoleList());
    }

    public function update($id)
    {
        $role = $this->adminRoleRepository->find($id);
        if ($role === null) {
            \App::abort(404, 'Resource not found');
        }

        $this->authorize('change-admin-role', $role);

        $updateSuccess = $this->adminRoleFormProcessor->update($role, request()->except('redirect_to'));
        if (!$updateSuccess) {
            return \Redirect::route('cc.admin-roles.edit', [$id])
                ->withErrors($this->adminRoleFormProcessor->errors())->withInput();
        } else {
            if (request()->get('redirect_to') === 'index') {
                $redirect = redirect()->route('cc.admin-roles.index');
            } else {
                $redirect = redirect()->route('cc.admin-roles.edit', [$id]);
            }

            return $redirect->with('alert_success', "Роль администратора {$role->name} обновлена");
        }
    }

    public function destroy($id)
    {
        $role = $this->adminRoleRepository->find($id);
        if ($role === null) {
            \App::abort(404, 'Resource not found');
        }

        $this->authorize('change-admin-role', $role);

        $this->adminRoleRepository->delete($role);
        return \Redirect::route('cc.admin-roles.index')
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
