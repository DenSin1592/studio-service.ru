<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\TabsController;
use App\Services\FormProcessors\BaseOneToManySubProcessor;
use App\Services\Repositories\Services\ServiceTab\ServiceTabRepository;

final class Tabs extends BaseOneToManySubProcessor
{
    protected const SUB_FORM_NAME = TabsController::RELATIONS_NAME;


    protected function setRepository(): void
    {
        $this->repository = \App(ServiceTabRepository::class);
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
