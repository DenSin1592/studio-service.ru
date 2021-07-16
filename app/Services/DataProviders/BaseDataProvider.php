<?php

namespace App\Services\DataProviders;

abstract class BaseDataProvider
{
    public function __construct(
        protected string $modelKey,
        protected array $subFormList = []
    ){}

    public function provideData(\Eloquent $model, array $oldInput): array
    {
        $data = [
            $this->modelKey => $model,
        ];

        foreach ($this->subFormList as $subForm) {
            $subFormData = $subForm->provideData($model, $oldInput);
            $data = array_replace($data, $subFormData);
        }

        return $data;
    }
}
