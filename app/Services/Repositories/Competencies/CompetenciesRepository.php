<?php

namespace App\Services\Repositories\Competencies;

use App\Models\Competence;
use App\Services\Repositories\BaseFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class CompetenciesRepository extends BaseFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new Competence();
    }

    public function getModelsForCompetencePage()
    {
        return $this->getModel()
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }

    public function getModelforShowByAliasOrFail(string $alias)
    {
        return $this->getModel()
            ->with([
                'services' => static function ($q) {
                    $q->with(['tasks' => static function($qu){
                        $qu->orderBy('position')->where('publish', true);
                    }])->where('publish', true)->orderBy('position');
                },
                'contentBlocks' => static function ($q) {
                    $q->where('publish', true)->orderBy('position');
                }])
            ->where('alias', $alias)
            ->where('publish', true)
            ->firstOrFail();
    }
}
