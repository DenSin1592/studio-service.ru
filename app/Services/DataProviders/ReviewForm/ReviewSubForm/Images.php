<?php

namespace App\Services\DataProviders\ReviewForm\ReviewSubForm;

use App\Services\DataProviders\BaseSubForm;
use App\Services\Eloquent\CollectionExtractor;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;

class Images extends BaseSubForm
{
    use CollectionExtractor;

    public function __construct(
        private ReviewImageRepository $repository
    ){}

    public function provideData(\Eloquent $model, array $oldInput): array
    {
        $images = $this->extractFromArray(
            function () {
                return $this->repository->newInstance();
            },
            $oldInput,
            'images',
            $this->repository->allForReview($model)
        );

        return ['images' => $images];
    }
}
