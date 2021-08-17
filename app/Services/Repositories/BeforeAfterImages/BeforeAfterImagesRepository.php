<?php

namespace App\Services\Repositories\BeforeAfterImages;

use App\Models\BeforeAfterImage;
use App\Services\Repositories\BaseFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class BeforeAfterImagesRepository extends BaseFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new BeforeAfterImage();
    }
}
