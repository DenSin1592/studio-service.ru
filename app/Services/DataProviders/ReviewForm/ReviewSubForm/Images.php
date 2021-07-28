<?php

namespace App\Services\DataProviders\ReviewForm\ReviewSubForm;

use App\Http\Controllers\Admin\Relations\Reviews\ImagesController;
use App\Services\DataProviders\BaseSubForm;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;
use Illuminate\Database\Eloquent\Model;

class Images extends BaseSubForm
{
    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    public function __construct(
        private ReviewImageRepository $repository
    ){}

    public function provideData(Model $model, array $oldInput): array
    {
        $models = $this->repository->allForModel($model);
        return [self::SUB_FORM_NAME => $models];
    }
}
