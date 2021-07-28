<?php


namespace App\Services\DataProviders\NodeForm;

use App\Http\Controllers\Admin\EssenceControllers\StructureController;
use App\Services\DataProviders\BaseDataProvider;

final class NodeForm extends BaseDataProvider
{
    public const MODEL_KEY = StructureController::ESSENCE_NAME;
}
