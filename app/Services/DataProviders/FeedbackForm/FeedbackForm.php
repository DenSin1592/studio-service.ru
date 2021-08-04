<?php


namespace App\Services\DataProviders\FeedbackForm;

use App\Http\Controllers\Admin\EssenceControllers\FeedbackController;
use App\Services\DataProviders\BaseDataProvider;

final class FeedbackForm extends BaseDataProvider
{
    public const MODEL_KEY = FeedbackController::ESSENCE_NAME;
}
