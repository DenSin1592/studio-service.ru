<?php

namespace App\Services\Validation\BeforeAfterImage;

use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\Rule;

class BeforeAfterImageValidator extends AbstractLaravelValidator
{
    protected function getRules(): array
    {
        $rules = [];
        $rules['name'] = "required";
        $rules['alias'] = ['nullable',  Rule::unique('competencies')->ignore($this->currentId)];

        return $rules;
    }
}
