<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\TasksController;
use App\Services\FormProcessors\SubProcessor;
use App\Services\Repositories\TargetAudience\ServiceTask\ServiceTaskRepository;
use Illuminate\Database\Eloquent\Model;

class Tasks implements SubProcessor
{
    protected const SUB_FORM_NAME = TasksController::RELATIONS_NAME;

    public function __construct(
        private ServiceTaskRepository $repository
    ){}

    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(Model $model, array $data)
    {
        $relation = self::SUB_FORM_NAME;

        $imagesListData = \Arr::get($data, self::SUB_FORM_NAME,  []);
        $this->SelectNotEmptyData($imagesListData);

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


    private function SelectNotEmptyData(array &$imagesListData) :void
    {

        $imagesListData = array_filter(
            $imagesListData,
            static function($val) {
                foreach ($val as $v){
                    if(!empty($v))
                        return true;
                }
                return false;
            }
        );
    }

}
