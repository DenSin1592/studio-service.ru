<?php

namespace App\Services\Repositories\OurWork;

use App\Models\OurWork;
use App\Services\Repositories\BaseFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class OurWorkRepository extends BaseFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new OurWork();
    }

    public function getModelsForHomePage()
    {
        return $this->getModel()
            ->with('services')
            ->where('on_home_page', true)
            ->orderBy('position')
            ->get();
    }
}
