<?php


namespace App\Services\DataProviders\TargetAudienceForm;

use App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController;
use App\Services\DataProviders\BaseDataProvider;

class TargetAudienceForm extends BaseDataProvider
{
    public const MODEL_KEY = TargetAudiencesController::ESSENCE_NAME;
}
