<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DataProviders\AdminUserForm\AdminUserForm;
use App\Services\FormProcessors\AdminUser\AdminUserFormProcessor;
use App\Services\Repositories\AdminUser\AdminUserRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminUsersController extends Controller
{
    public const  ROUTE_INDEX = 'cc.admin-users.index';
    public const  ROUTE_CREATE = 'cc.admin-users.create';
    public const  ROUTE_STORE = 'cc.admin-users.store';
    public const  ROUTE_EDIT = 'cc.admin-users.edit';
    public const  ROUTE_UPDATE = 'cc.admin-users.update';
    public const  ROUTE_DESTROY = 'cc.admin-users.destroy';

    public function __construct(
        private AdminUserRepository $adminUserRepository,
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
            ->with($this->adminUserForm->provideData($this->adminUserRepository->newInstance(), request()->old()))
            ->with('user_list', $this->getUserList());
    }


    public function store()
    {
        $createdUser = $this->adminUserFormProcessor->create(request()->except('redirect_to'));
        if ($createdUser === null)
            return \Redirect::route(self::ROUTE_CREATE)->withErrors($this->adminUserFormProcessor->errors())->withInput();

        if (request()->get('redirect_to') === 'index') {
            $redirect = \Redirect::route(self::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(self::ROUTE_EDIT, [$createdUser->id]);
        }

        return $redirect->with('alert_success', "Администратор {$createdUser->username} создан");
    }


    public function edit($id)
    {
        $user = $this->adminUserRepository->findById($id);

        $this->authorize('change-admin-user', $user);

        if ($user === null)
            \App::abort(404, 'Resource not found');

        if ($user['super'] && !\Auth::user()->super)
            \App::abort(403, 'Super user can be edited only by super user');

        return \View('admin.admin_users.edit')
            ->with($this->adminUserForm->provideData($user, request()->old()))
            ->with('user_list', $this->getUserList());
    }


    public function update($id)
    {
        $user = $this->adminUserRepository->findById($id);
        if ($user === null)
            \App::abort(404, 'Resource not found');

        $this->authorize('change-admin-user', $user);

        $updateSuccess = $this->adminUserFormProcessor->update($user, request()->except('redirect_to'));
        if (!$updateSuccess)
            return \Redirect::route(self::ROUTE_EDIT, [$id])->withErrors($this->adminUserFormProcessor->errors())->withInput();

        if (request()->get('redirect_to') === 'index') {
            $redirect = \Redirect::route(self::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(self::ROUTE_EDIT, [$id]);
        }

        return $redirect->with('alert_success', "Администратор {$user->username} обновлён");
    }


    public function destroy($id)
    {
        if (\Auth::user()->id == $id)
            \App::abort(403);

        $user = $this->adminUserRepository->findById($id);
        if (is_null($user))
            \App::abort(404, 'Resource not found');

        $this->authorize('change-admin-user', $user);

        $this->adminUserRepository->delete($user);
        return \Redirect::route(self::ROUTE_INDEX)
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
