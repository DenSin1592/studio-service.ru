<?php

namespace App\Services\FormProcessors\Review\SubProcessor;

use App\Http\Controllers\Admin\Relations\Reviews\ImagesController;
use App\Models\ReviewImage;
use App\Services\FormProcessors\SubProcessor;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;
use Arr;
use Illuminate\Database\Eloquent\Model;

class Images implements SubProcessor
{
    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    public function __construct(
        private ReviewImageRepository $repository
    ){}

    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(Model $model, array $data)
    {
        $relation = self::SUB_FORM_NAME;

        $imagesListData = Arr::get($data, self::SUB_FORM_NAME,  []);
        $this->SelectDataWithImages($imagesListData);

        $currentIds = collect($model->$relation)
            ->pluck('id')
            ->all();

        $touchedIds = [];
        foreach ($imagesListData as $imageData) {
            $image = $this->repository->createOrUpdateImageForModel($model, $imageData);
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
