<?php

namespace App\Services\FormProcessors\Offer\SubProcessor;

use App\Http\Controllers\Admin\Relations\Offers\ReviewsController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class Reviews extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = ReviewsController::RELATIONS_NAME;
}
