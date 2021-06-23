<?php

namespace App\Services\Validation\TargetAudience;

use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;

class TargetAudienceLaravelValidator extends AbstractLaravelValidator
{

    public function __construct(ValidatorFactory $validatorFactory)
    {
        parent::__construct($validatorFactory);
    }


    protected function getRules(): array
    {
        $parentId = \Arr::get($this->data, 'parent_id');
        if (is_null($parentId)) {
            $parentId = 'NULL';
        }

        $rules = [];
        $rules['name'] = "required";
        $rules['alias'] = ['nullable', "unique:target_audiences,alias,{$this->currentId},id,parent_id,{$parentId}"];
        $rules['parent_id'] = ['nullable', "exists:target_audiences,id"];

        return $rules;
    }
}
