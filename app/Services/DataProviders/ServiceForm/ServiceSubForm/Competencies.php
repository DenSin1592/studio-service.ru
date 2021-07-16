<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Services\DataProviders\BaseSubForm;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class Competencies extends BaseSubForm
{
    public function __construct(
        private CompetenciesRepository $repository
    ){}

    public function provideData(\Eloquent $model, array $oldInput): array
    {
        if (count($oldInput) === 0)
            return ['competencies' => $model->competencies->sortBy(
                function($query){
                    return $query->pivot->position;
                })
            ];


        $oldData = \Arr::get($oldInput, 'competencies');
        if (!is_array($oldData)) {
            $oldData = [];
        }

        $ids = [];
        foreach ($oldData as $element) {
            $ids[] = \Arr::get($element, 'id');
        }
        $competencies = $this->repository->allByIdsInSequence($ids);

        return ['competencies' => $competencies];
    }
}
