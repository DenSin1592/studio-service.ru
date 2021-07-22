<?php

namespace App\Services\FormProcessors\OurWork\SubProcessor;

use App\Http\Controllers\Admin\Relations\OurWorks\ImagesController;
use App\Models\OurWorkImage;
use App\Services\FormProcessors\SubProcessor;
use App\Services\Repositories\OurWork\OurWorkImage\OurWorkImageRepository;
use Arr;

class Images implements SubProcessor
{
    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    public function __construct(
        private OurWorkImageRepository $repository
    ){}

    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(\Eloquent $model, array $data)
    {
        $relation = self::SUB_FORM_NAME;

        $imagesListData = Arr::get($data, self::SUB_FORM_NAME,  []);
        $this->SelectDataWithImages($imagesListData);

        $currentIds = collect($model->$relation)
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
            static fn($val) => (isset($val[OurWorkImage::IMAGE_FILE]) || !empty($val['id']))
        );
       $test = 0;
    }
}
