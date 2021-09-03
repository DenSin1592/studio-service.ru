<?php

namespace App\Services\FormProcessors\TargetAudience\SubProcessor;

use App\Services\FormProcessors\BaseSubProcessor;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;
use Illuminate\Database\Eloquent\Model;

final class Children extends BaseSubProcessor
{
    protected function setRepository(): void
    {
        $this->repository = \App(TargetAudienceRepository::class);
    }


    public function save(Model $model, array $data)
    {
        if($data['parent_id'] === null){
            return;
        }

        $subModels = $model->children;
        if(is_null($subModels)) {
            return;
        }

        foreach ($subModels as $element){
            $element->parent_id = null;
            $element->save();
        }
    }
}
