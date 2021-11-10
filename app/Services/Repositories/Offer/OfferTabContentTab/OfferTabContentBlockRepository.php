<?php

namespace App\Services\Repositories\Offer\OfferTabContentTab;

use App\Models\TabsContentBlock;
use App\Services\Repositories\BaseRepository;

class OfferTabContentBlockRepository extends BaseRepository
{
    protected function setModel(): void
    {
        $this->model = new TabsContentBlock();
    }
}
