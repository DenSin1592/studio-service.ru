<?php


namespace App\Services\DataProviders\ServiceForm;

use App\Services\DataProviders\BaseDataProvider;
use App\Services\DataProviders\ServiceForm\ServiceSubForm\Competencies;

class ServiceForm extends BaseDataProvider
{
    protected function addSubForm(): void
    {
        $this->subFormList[] = \App(Competencies::class);
    }

    protected function getModelKey(): string
    {
        return 'service';
    }
}
