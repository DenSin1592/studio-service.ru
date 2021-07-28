<?php

namespace App\Services\Repositories\Setting;

use App\Models\Setting;
use App\Services\Repositories\BaseRepository;

class SettingRepository extends BaseRepository
{
    protected function setModel(): void
    {
        $this->model = new Setting();
    }

    public function findByKey($key)
    {
        return $this->getModel()->where('key', $key)->first();
    }


}
