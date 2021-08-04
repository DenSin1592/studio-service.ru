<?php

namespace App\Services\Validation\Feedback;

use App\Services\Validation\AbstractLaravelValidator;

class FeedbackValidator extends AbstractLaravelValidator
{
    protected function getRules(): array
    {
        return [
            //'name' => 'required',
            'file_project_file' => ['nullable','file', 'mimes:jpg,jpeg,bmp,png,pdf,doc']
        ];
    }

    public function getAttributeNames()
    {
        return [
            'file_project_file' => 'Файл проекта',
        ];
    }
}
