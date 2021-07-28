<?php


namespace App\Services\DataProviders\ServiceForm;

use App\Http\Controllers\Admin\EssenceControllers\ServicesController;
use App\Services\DataProviders\BaseDataProvider;

final class ServiceForm extends BaseDataProvider
{
    public const MODEL_KEY = ServicesController::ESSENCE_NAME;
}
