<?php

namespace App\Services\FormProcessors\Offer\SubProcessor;

use App\Http\Controllers\Admin\Relations\Offers\TasksController;
use App\Services\FormProcessors\BaseOneToManySubProcessor;
use App\Services\Repositories\Offer\OfferTask\OfferTaskRepository;

final class Tasks extends BaseOneToManySubProcessor
{
    protected const SUB_FORM_NAME = TasksController::RELATIONS_NAME;


    protected function setRepository(): void
    {
        $this->repository = \App(OfferTaskRepository::class);
    }


    protected function SelectNotEmptyData(array &$listData): void
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
