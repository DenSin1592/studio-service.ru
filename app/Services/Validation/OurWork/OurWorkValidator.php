<?php

namespace App\Services\Validation\OurWork;

use App\Services\Validation\AbstractLaravelValidator;

class OurWorkValidator extends AbstractLaravelValidator
{

    protected function getRules(): array
    {
        return [
            'name' => 'required',
        ];
    }

    protected function getAttributeNames(): array
    {
        return [
            //'text' => trans('validation.attributes.review_content'),
        ];
    }

}
