<?php namespace App\Services\Repositories\AdminUser;

use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class EloquentAdminUserRepository
 * @package App\Services\Repositories\AdminUser
 */
class EloquentAdminUserRepository
{
    public function all()
    {
        return AdminUser::orderBy('username')->get();
    }


    public function allWithoutSuper()
    {
        return AdminUser::orderBy('username')->where('super', false)->get();
    }


    public function allForUser(AdminUser $user): Collection
    {
        $query = AdminUser::orderBy('username');
        $descendantIdsAndSelf = $user->descendants()->pluck('admin_users.id')->merge($user->id)->all();
        $query->whereIn('id', $descendantIdsAndSelf);

        return $query->get();
    }

    public function newInstance(array $data = [])
    {
        return new AdminUser($data);
    }


    public function find($id)
    {
        return AdminUser::find($id);
    }


    public function create(array $data)
    {
        return AdminUser::create($data);
    }


    public function update(AdminUser $adminUser, array $data)
    {
        return $adminUser->update($data);
    }


    public function delete(AdminUser $adminUser)
    {
        return $adminUser->delete();
    }
}
