<?php

namespace App\Services\DataProviders;

abstract class BaseDataProvider
{
    protected array $subFormList = [];

    public function addSubForm(BaseSubForm $subForm): void
    {
        $this->subFormList[] = $subForm;
    }

    public function provideData(\Eloquent $model, array $oldInput): array
    {
        $data = [
            static::MODEL_KEY => $model,
        ];

        foreach ($this->subFormList as $subForm) {
            $subFormData = $subForm->provideData($model, $oldInput);
            $data = array_replace($data, $subFormData);
        }

        return $data;
    }
}
