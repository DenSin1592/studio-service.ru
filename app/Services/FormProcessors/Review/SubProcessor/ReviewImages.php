<?php

namespace App\Services\FormProcessors\Review\SubProcessor;

use App\Models\ReviewImage;
use App\Services\FormProcessors\SubProcessor;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;
use Arr;

class ReviewImages implements SubProcessor
{
    public function __construct(
        private ReviewImageRepository $repository
    ){}

    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(\Eloquent $model, array $data)
    {
        $imagesListData = Arr::get($data, 'images',  []);
        $this->SelectDataWithImages($imagesListData);

        $currentIds = collect($model->images)
            ->pluck('id')
            ->all();

        $touchedIds = [];
        foreach ($imagesListData as $imageData) {
            $image = $this->repository->createOrUpdateForReview($model, $imageData);
            $touchedIds[] = $image->id;
        }

        $idsToDelete = array_diff($currentIds, $touchedIds);
        foreach ($idsToDelete as $idToDelete) {
            $this->repository->deleteById($idToDelete);
        }
    }


    private function SelectDataWithImages(array &$imagesListData) :void
    {
        $imagesListData = array_filter(
            $imagesListData,
            static fn($val) => isset($val[ReviewImage::IMAGE_FILE])
        );
    }
}
