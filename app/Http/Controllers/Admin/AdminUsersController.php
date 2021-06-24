<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DataProviders\AdminUserForm\AdminUserForm;
use App\Services\FormProcessors\AdminUser\AdminUserFormProcessor;
use App\Services\Repositories\AdminUser\EloquentAdminUserRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminUsersController extends Controller
{
    public function __construct(
        private EloquentAdminUserRepository $adminUserRepository,
        private AdminUserFormProcessor $adminUserFormProcessor,
        private AdminUserForm $adminUserForm,
    ){}


    public function index()
    {
        return \View('admin.admin_users.index')->with('user_list', $this->getUserList());
    }


    public function create()
    {
        return \View('admin.admin_users.create')
            ->with($this->adminUserForm->provideDataFor($this->adminUserRepository->newInstance(), request()->old()))
            ->with('user_list', $this->getUserList());
    }


    public function store()
    {
        $createdUser = $this->adminUserFormProcessor->create(request()->except('redirect_to'));
        if ($createdUser === null)
            return \Redirect::route('cc.admin-users.create')->withErrors($this->adminUserFormProcessor->errors())->withInput();

        if (request()->get('redirect_to') === 'index') {
            $redirect = \Redirect::route('cc.admin-users.index');
        } else {
            $redirect = \Redirect::route('cc.admin-users.edit', [$createdUser->id]);
        }

        return $redirect->with('alert_success', "Администратор {$createdUser->username} создан");
    }


    public function edit($id)
    {
        $user = $this->adminUserRepository->find($id);

        $this->authorize('change-admin-user', $user);

        if ($user === null)
            \App::abort(404, 'Resource not found');

        if ($user['super'] && !\Auth::user()->super)
            \App::abort(403, 'Super user can be edited only by super user');

        return \View('admin.admin_users.edit')
            ->with($this->adminUserForm->provideDataFor($user, request()->old()))
            ->with('user_list', $this->getUserList());
    }


    public function update($id)
    {
        $user = $this->adminUserRepository->find($id);
        if ($user === null)
            \App::abort(404, 'Resource not found');

        $this->authorize('change-admin-user', $user);

        $updateSuccess = $this->adminUserFormProcessor->update($user, request()->except('redirect_to'));
        if (!$updateSuccess)
            return \Redirect::route('cc.admin-users.edit', [$id])->withErrors($this->adminUserFormProcessor->errors())->withInput();

        if (request()->get('redirect_to') === 'index') {
            $redirect = \Redirect::route('cc.admin-users.index');
        } else {
            $redirect = \Redirect::route('cc.admin-users.edit', [$id]);
        }

        return $redirect->with('alert_success', "Администратор {$user->username} обновлён");
    }


    public function destroy($id)
    {
        if (\Auth::user()->id == $id)
            \App::abort(403);

        $user = $this->adminUserRepository->find($id);
        if (is_null($user))
            \App::abort(404, 'Resource not found');

        $this->authorize('change-admin-user', $user);

        $this->adminUserRepository->delete($user);
        return \Redirect::route('cc.admin-users.index')
            ->with('alert_success', "Администратор {$user->username} удалён");
    }


    private function getUserList(): Collection|array
    {
        $user = \Auth::user();

        if ($user === null) {
            $userList = Collection::make();
        } elseif ($user->super) {
            $userList = $this->adminUserRepository->all();
        } else {
            $userList = $this->adminUserRepository->allForUser($user);
        }

        return $userList;
    }
}
