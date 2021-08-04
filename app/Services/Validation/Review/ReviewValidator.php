<?php

namespace App\Services\Validation\Review;

use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\Rule;

class ReviewValidator extends AbstractLaravelValidator
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
            'text' => trans('validation.attributes.review_content'),
        ];
    }

}
