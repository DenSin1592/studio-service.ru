<?php

namespace App\Services\DataProviders\ReviewForm\ReviewSubForm;

use App\Http\Controllers\Admin\Relations\Reviews\ImagesController;
use App\Services\DataProviders\BaseSubForm;
use App\Services\Eloquent\CollectionExtractor;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;

class Images extends BaseSubForm
{
    use CollectionExtractor;

    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    public function __construct(
        private ReviewImageRepository $repository
    ){}

    public function provideData(\Eloquent $model, array $oldInput): array
    {
        $models = $this->extractFromArray(
             fn() => $this->repository->newInstance(),
            $oldInput,
            self::SUB_FORM_NAME,
            $this->repository->allForReview($model)
        );

        return [self::SUB_FORM_NAME => $models];
    }
}
