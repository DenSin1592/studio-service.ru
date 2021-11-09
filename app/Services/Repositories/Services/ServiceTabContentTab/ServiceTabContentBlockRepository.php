<?php

namespace App\Services\Repositories\Services\ServiceTabContentTab;

use App\Models\TabsContentBlock;
use App\Services\Repositories\BaseRepository;

class ServiceTabContentBlockRepository extends BaseRepository
{
    protected function setModel(): void
    {
        $this->model = new TabsContentBlock();
    }
}
