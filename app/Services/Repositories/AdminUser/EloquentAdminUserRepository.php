<?php

namespace App\Services\Repositories\AdminUser;

use App\Models\AdminUser;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class EloquentAdminUserRepository
 * @package App\Services\Repositories\AdminUser
 */
class EloquentAdminUserRepository extends BaseRepository implements CreateUpdateRepositoryInterface
{

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
