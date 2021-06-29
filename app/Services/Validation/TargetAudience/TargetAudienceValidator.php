<?php

namespace App\Services\Validation\TargetAudience;

use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\Rule;

class TargetAudienceValidator extends AbstractLaravelValidator
{

    public function __construct(ValidatorFactory $validatorFactory)
    {
        parent::__construct($validatorFactory);
    }


    protected function getRules(): array
    {
        $rules = [];
        $rules['name'] = "required";
        $rules['alias'] = ['nullable',  Rule::unique('target_audiences')->ignore($this->currentId)];
        $rules['parent_id'] = ['nullable', "exists:target_audiences,id"];

        return $rules;
    }
}
