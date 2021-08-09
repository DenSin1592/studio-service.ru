<?php

namespace App\Services\Validation\Offer;

use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Rule;

class OfferValidator extends AbstractLaravelValidator
{
    protected function getRules(): array
    {
        $rules = [];
        $rules['name'] = "required";
        $rules['alias'] = ['nullable',  Rule::unique('offers')->ignore($this->currentId)];
        $rules['service_id'] = ['required', "exists:services,id"];
        $rules['target_audience_id'] = ['required', "exists:target_audiences,id"];

        return $rules;
    }

    public function getAttributeNames()
    {
        return [
            'service_id' => '"Услуга"',
            'target_audience_id' => '"ЦА"',
        ];
    }
}
