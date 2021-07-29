<?php

namespace App\Services\FormProcessors\OurWork\SubProcessor;

use App\Http\Controllers\Admin\Relations\OurWorks\ServicesController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class Services extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = ServicesController::RELATIONS_NAME;
}
