<?php

namespace App\Services\Repositories\Setting;

use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;

/**
 * Class EloquentSettingRepository
 * @package  App\Services\Repositories\Setting
 */
class EloquentSettingRepository extends BaseRepository implements CreateUpdateRepositoryInterface
{
    public function findByKey($key)
    {
        return $this->getModel()->where('key', $key)->first();
    }
}
