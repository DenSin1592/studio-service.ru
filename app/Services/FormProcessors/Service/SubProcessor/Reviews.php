<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\ReviewsController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class Reviews extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = ReviewsController::RELATIONS_NAME;
}
