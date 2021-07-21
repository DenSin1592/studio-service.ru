<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\CompetenciesController;
use App\Services\FormProcessors\BaseSubProcessor;

class Competencies extends BaseSubProcessor
{
    protected const SUB_FORM_NAME = CompetenciesController::RELATIONS_NAME;
}
