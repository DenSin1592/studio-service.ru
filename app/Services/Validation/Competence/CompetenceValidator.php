<?php

namespace App\Services\Validation\Competence;

use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\Rule;

class CompetenceValidator extends AbstractLaravelValidator
{
    protected function getRules(): array
    {
        $rules = [];
        $rules['name'] = "required";
        $rules['alias'] = ['nullable',  Rule::unique('competencies')->ignore($this->currentId)];

        return $rules;
    }
}
