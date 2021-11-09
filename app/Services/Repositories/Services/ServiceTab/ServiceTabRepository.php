<?php

namespace App\Services\Repositories\Services\ServiceTab;

use App\Models\ServiceTab;
use App\Models\TabsContentBlock;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;


class ServiceTabRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new ServiceTab();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->service();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->tabs();
    }


    public function createOrUpdateRelationForModel(Model $model, array $data = [])
    {
        $subModel = parent::createOrUpdateRelationForModel($model, $data);
        $this->createForUpdateBlockable($subModel, $data);

        return $subModel;
    }


    private function createForUpdateBlockable(Model $test, array $data): void
    {
        $currentIds = collect($test->contentBlocks)
            ->pluck('id')
            ->all();

        if(!isset($data['blockable'])){
            TabsContentBlock::destroy($currentIds);
            return;
        }

        $this->SelectNotEmptyData($data['blockable']);

        $touchedIds = [];
        foreach ($data['blockable'] as $elem){
            $id = \Arr::get($elem, 'id');
            $model = $test->contentBlocks()->where('id', $id)->first();

            if(is_null($model)){
                $model = new TabsContentBlock();
            }

            $model->blockable()->associate($test);
            $model->fill($elem);
            $model->save();

            $touchedIds[] = $model->id;
        }

        $idsToDelete = array_diff($currentIds, $touchedIds);
        TabsContentBlock::destroy($idsToDelete);

    }


    private function SelectNotEmptyData(array &$listData): void
    {
        $listData = array_filter(
            $listData,
            static function($val) {
                foreach ($val as$k => $v){
                    if(!empty($v) && $k!=='publish')
                        return true;
                }
                return false;
            }
        );
    }
}
