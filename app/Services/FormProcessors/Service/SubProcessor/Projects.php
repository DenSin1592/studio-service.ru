<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\ProjectsController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class Projects extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = ProjectsController::RELATIONS_NAME;
}
