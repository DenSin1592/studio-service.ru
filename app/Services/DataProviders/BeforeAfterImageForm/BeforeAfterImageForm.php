<?php


namespace App\Services\DataProviders\BeforeAfterImageForm;

use App\Http\Controllers\Admin\EssenceControllers\BeforeAfterImagesController;
use App\Services\DataProviders\BaseDataProvider;

final class BeforeAfterImageForm extends BaseDataProvider
{
    public const MODEL_KEY = BeforeAfterImagesController::ESSENCE_NAME;
}
