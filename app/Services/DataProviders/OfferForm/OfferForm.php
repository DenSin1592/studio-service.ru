<?php


namespace App\Services\DataProviders\OfferForm;

use App\Http\Controllers\Admin\EssenceControllers\OffersController;
use App\Services\DataProviders\BaseDataProvider;

final class OfferForm extends BaseDataProvider
{
    public const MODEL_KEY = OffersController::ESSENCE_NAME;
}
