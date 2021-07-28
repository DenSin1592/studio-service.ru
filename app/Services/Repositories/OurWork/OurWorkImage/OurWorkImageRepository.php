<?php

namespace App\Services\Repositories\OurWork\OurWorkImage;

use App\Models\OurWork;
use App\Models\OurWorkImage;
use App\Services\Repositories\BaseImageRepository;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;

class OurWorkImageRepository extends BaseImageRepository
{
    protected function setModel(): void
    {
        $this->model = new OurWorkImage();
    }

    protected function getRelation(\Eloquent $model)
    {
        return $model->ourWork();
    }
}
