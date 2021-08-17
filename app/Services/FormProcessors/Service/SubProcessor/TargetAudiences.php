<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\TargetAudiencesController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class TargetAudiences extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = TargetAudiencesController::RELATIONS_NAME;
}
