<?php

namespace App\Services\Validation\Feedback;

use App\Services\Validation\AbstractLaravelValidator;

class FeedbackValidator extends AbstractLaravelValidator
{
    protected function getRules(): array
    {
        return [
            'phone' => 'required',
            'file_project_file' => ['nullable','file', 'mimes:jpg,jpeg,bmp,png,pdf']
        ];
    }

    public function getAttributeNames()
    {
        return [
            'file_project_file' => 'Файл проекта',
        ];
    }
}
