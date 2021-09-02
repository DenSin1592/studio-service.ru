<?php

namespace App\Services\FormProcessors\Offer\SubProcessor;

use App\Http\Controllers\Admin\Relations\Offers\CompetenciesController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class Competencies extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = CompetenciesController::RELATIONS_NAME;
}
