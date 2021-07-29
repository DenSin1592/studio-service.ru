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


    protected function SelectNotEmptyData(array &$imagesListData): void
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
