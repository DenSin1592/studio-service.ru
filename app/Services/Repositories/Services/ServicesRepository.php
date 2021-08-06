<?php

namespace App\Services\Repositories\Services;

use App\Models\Service;
use App\Services\Repositories\BaseFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class ServicesRepository extends BaseFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new Service();
    }

    public function getModelsForHomePage()
    {
        return $this->getModel()
            ->with('tasks')
            ->where('on_home_page', true)
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }

    public function getModelsForServicePage()
    {
        return $this->getModel()
            ->with(['tasks' => static function($q){
                $q->orderBy('position');
            }])
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }
}
