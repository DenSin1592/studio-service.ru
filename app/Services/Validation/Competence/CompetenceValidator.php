<?php

namespace App\Services\Validation\Competence;

use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\Rule;

class CompetenceValidator extends AbstractLaravelValidator
{
    public function __construct(ValidatorFactory $validatorFactory)
    {
        parent::__construct($validatorFactory);
    }


    protected function getRules(): array
    {
        $rules = [];
        $rules['name'] = "required";
        $rules['alias'] = ['nullable',  Rule::unique('competencies')->ignore($this->currentId)];
        $rules['parent_id'] = ['nullable', "exists:target_audiences,id"];

        return $rules;
    }
}
