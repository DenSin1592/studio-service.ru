<?php


namespace App\Services\DataProviders\OurWorkForm;

use App\Http\Controllers\Admin\EssenceControllers\OurWorksController;
use App\Services\DataProviders\BaseDataProvider;

class OurWorkForm extends BaseDataProvider
{
    public const MODEL_KEY = OurWorksController::ESSENCE_NAME;
}
