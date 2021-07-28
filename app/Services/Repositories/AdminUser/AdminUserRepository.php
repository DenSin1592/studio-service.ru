<?php

namespace App\Services\Repositories\AdminUser;

use App\Models\AdminUser;
use App\Services\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class AdminUserRepository extends BaseRepository
{
    protected function setModel(): void
    {
        $this->model = new AdminUser();
    }


    public function allWithoutSuper()
    {
        return $this->getModel()->orderBy('username')->where('super', false)->get();
    }


    public function allForUser(AdminUser $user): Collection
    {
        $query = $this->getModel()->orderBy('username');
        $descendantIdsAndSelf = $user->descendants()->pluck('admin_users.id')->merge($user->id)->all();
        $query->whereIn('id', $descendantIdsAndSelf);

        return $query->get();
    }
}
