<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\BeforeAfterImagesController;
use App\Services\FormProcessors\BaseManyToManySubProcessor;

final class BeforeAfterImages extends BaseManyToManySubProcessor
{
    protected const SUB_FORM_NAME = BeforeAfterImagesController::RELATIONS_NAME;
}
