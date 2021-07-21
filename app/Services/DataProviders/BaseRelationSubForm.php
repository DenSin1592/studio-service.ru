<?php


namespace App\Services\DataProviders;


abstract class BaseRelationSubForm extends BaseSubForm
{
    protected $repository;

    abstract protected function setRepository();

    public function __construct(){
        $this->setRepository();
    }

    public function provideData(\Eloquent $model, array $oldInput): array
    {
        $relation = static::SUB_FORM_NAME;
        if (count($oldInput) === 0)
            return [static::SUB_FORM_NAME => $model->$relation->sortBy(
                fn($query) => $query->pivot->position
            )];

        $oldData = \Arr::get($oldInput, static::SUB_FORM_NAME);
        if (!is_array($oldData)) {
            $oldData = [];
        }

        $ids = [];
        foreach ($oldData as $element) {
            $ids[] = \Arr::get($element, 'id');
        }
        $subModels = $this->repository->allByIdsInSequence($ids);

        return [static::SUB_FORM_NAME => $subModels];
    }

}
