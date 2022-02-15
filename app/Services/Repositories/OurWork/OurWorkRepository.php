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
            ->with([
                'services' => static function ($q) {
                    $q->where('publish', true)->orderBy('position');
                }])
            ->where('on_home_page', true)
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }

    public function getModelForShowByAlias(string $alias): OurWork
    {
        return $this->getModel()
            ->with([
                'services' => static function ($q) {
                    $q->with(['tasks' => static function($qu){
                        $qu->orderBy('position');
                    }])->where('publish', true)->orderBy('position');
                }])
            ->where('alias', $alias)
            ->where('publish', true)
            ->first() ?? $this->getModel();
    }

    public function getOtherModelsForModelByAlias(string $alias)
    {
        return $this->getModel()
            ->where('alias', '<>', $alias)
            ->with([
                'services' => static function ($q) {
                    $q->with(['tasks' => static function($qu){
                        $qu->orderBy('position');
                    }])->where('publish', true)->orderBy('position');
                }])
            ->where('publish', true)
            ->get();
    }

    public function getModelsForProjectPage()
    {
        return $this->getModel()
            ->with([
                'services' => static function ($q) {
                    $q->where('publish', true)->orderBy('position');
                }])
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }
}
