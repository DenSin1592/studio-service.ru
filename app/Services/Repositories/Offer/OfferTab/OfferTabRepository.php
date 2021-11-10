<?php

namespace App\Services\Repositories\Offer\OfferTab;

use App\Models\OfferTab;

use App\Models\TabsContentBlock;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class OfferTabRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new OfferTab();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->offer();
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


    private function createForUpdateBlockable(Model $model, array $data): void
    {
        $currentIds = collect($model->contentBlocks)
            ->pluck('id')
            ->all();

        if(!isset($data['blockable'])){
            TabsContentBlock::destroy($currentIds);
            return;
        }

        $this->SelectNotEmptyData($data['blockable']);

        $touchedIds = [];
        foreach ($data['blockable'] as $elem){

            if (\Arr::get($elem, 'position') === null) {
                $maxPosition = $model->contentBlocks()->max('position');
                if (is_null($maxPosition)) {
                    $maxPosition = 0;
                }
                $elem['position'] = $maxPosition + self::POSITION_STEP;
            }

            $id = \Arr::get($elem, 'id');
            $subModel = $model->contentBlocks()->where('id', $id)->first();

            if(is_null($subModel)){
                $subModel = new TabsContentBlock();
            }

            $subModel->blockable()->associate($model);
            $subModel->fill($elem);
            $subModel->save();

            $touchedIds[] = $subModel->id;
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
