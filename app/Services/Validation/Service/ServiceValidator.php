<?php


namespace App\Services\Validation\Service;


use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\Rule;

class ServiceValidator extends AbstractLaravelValidator
{
    protected function getRules(): array
    {
        $rules = [];
        $rules['name'] = "required";
        $rules['alias'] = ['nullable',  Rule::unique('services')->ignore($this->currentId)];
        $rules['parent_id'] = ['nullable', "exists:target_audiences,id"];

        return $rules;
    }

}
