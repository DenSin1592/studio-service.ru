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
}
