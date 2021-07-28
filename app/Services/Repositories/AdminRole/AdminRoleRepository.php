<?php

namespace App\Services\Repositories\AdminRole;

use App\Models\AdminRole;
use App\Models\AdminUser;
use App\Services\Repositories\BaseRepository;

class AdminRoleRepository extends BaseRepository
{
    protected function setModel(): void
    {
        $this->model = new AdminRole();
    }


    public function allForUser(AdminUser $user)
    {
        $query = $this->getModel()->query();
        $descendantIdsAndSelf = $user->descendants()->pluck('admin_users.id')->merge($user->id)->all();
        $query->whereIn('parent_id', $descendantIdsAndSelf);

        return $query->get();
    }


    public function getVariantsForUser(AdminUser $user): array
    {
        $userIds = $user->descendants()
            ->pluck('admin_users.id')
            ->merge($user->id)
            ->all();

        return $this->getModel()::orderBy('name')
            ->where(
                fn($query) => $query->whereIn('parent_id', $userIds)->orWhere('id', optional($user->role)->id))
            ->get()
            ->mapWithKeys(
                fn($item) => [$item['id'] => $item['name'] . ' (' . $item['parent']->username . ')'])
            ->all();
    }
}
