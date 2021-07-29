<?php

namespace App\Services\FormProcessors\Review\SubProcessor;

use App\Http\Controllers\Admin\Relations\Reviews\ServicesController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class Services extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = ServicesController::RELATIONS_NAME;
}
