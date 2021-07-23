<?php


namespace App\Services\DataProviders\ReviewForm;

use App\Http\Controllers\Admin\EssenceControllers\ReviewsController;
use App\Services\DataProviders\BaseDataProvider;

class ReviewForm extends BaseDataProvider
{
    public const MODEL_KEY = ReviewsController::ESSENCE_NAME;
}
