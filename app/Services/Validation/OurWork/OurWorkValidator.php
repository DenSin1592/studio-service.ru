<?php

namespace App\Services\Validation\OurWork;

use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Rule;

class OurWorkValidator extends AbstractLaravelValidator
{
    protected function getRules(): array
    {
        return [
            'name' => 'required',
            'alias' => ['nullable',  Rule::unique('our_works')->ignore($this->currentId)]
        ];
    }

    protected function getAttributeNames(): array
    {
        return [
            //'text' => trans('validation.attributes.review_content'),
        ];
    }

}
