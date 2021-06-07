<?php namespace App\Services\Repositories\AdminRole;

use App\Models\AdminRole;
use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Collection;

class AdminRoleRepository
{
    public function create(array $data): AdminRole
    {
        return AdminRole::create($data);
    }


    public function update(AdminRole $adminRole, array $data): bool
    {
        return $adminRole->update($data);
    }


    public function all(): Collection
    {
        return AdminRole::all();
    }


    public function allForUser(AdminUser $user)
    {
        $query = AdminRole::query();
        $descendantIdsAndSelf = $user->descendants()->pluck('admin_users.id')->merge($user->id)->all();
        $query->whereIn('parent_id', $descendantIdsAndSelf);

        return $query->get();
    }

    public function newInstance(array $data = []): AdminRole
    {
        return new AdminRole($data);
    }


    public function find($id): ?AdminRole
    {
        return AdminRole::find($id);
    }


    public function delete(AdminRole $role)
    {
        return $role->delete();
    }


    public function getVariantsForUser(AdminUser $user): array
    {
        $userIds = $user->descendants()
            ->pluck('admin_users.id')
            ->merge($user->id)
            ->all();

        return AdminRole::orderBy('name')
            ->where(function ($query) use ($userIds, $user) {
                $query->whereIn('parent_id', $userIds);
                $query->orWhere('id', optional($user->role)->id);
            })
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item['id'] => $item['name'] . ' (' . $item['parent']->username . ')'];
            })->all();
    }
}
