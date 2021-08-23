<?php

namespace App\Services\FormProcessors\Offer\SubProcessor;

use App\Http\Controllers\Admin\Relations\Offers\ProjectsController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class Projects extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = ProjectsController::RELATIONS_NAME;
}
