<?php


namespace App\Services\DataProviders\CompetenceForm;

use App\Http\Controllers\Admin\EssenceControllers\CompetenciesController;
use App\Services\DataProviders\BaseDataProvider;

class CompetenceForm extends BaseDataProvider
{
    public const MODEL_KEY = CompetenciesController::ESSENCE_NAME;
}
