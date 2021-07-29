<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\CompetenciesController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class Competencies extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = CompetenciesController::RELATIONS_NAME;
}
