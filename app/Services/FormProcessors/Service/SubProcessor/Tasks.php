<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\TasksController;
use App\Services\FormProcessors\BaseOneToManySubProcessor;
use App\Services\Repositories\Services\ServiceTask\ServiceTaskRepository;

final class Tasks extends BaseOneToManySubProcessor
{
    protected const SUB_FORM_NAME = TasksController::RELATIONS_NAME;


    protected function setRepository(): void
    {
        $this->repository = \App(ServiceTaskRepository::class);
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
