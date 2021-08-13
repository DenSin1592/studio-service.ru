<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\ContentBlocksController;
use App\Services\FormProcessors\BaseOneToManySubProcessor;
use App\Services\Repositories\Services\ServiceContentBlock\ServiceContentBlockRepository;


final class ContentBlocks extends BaseOneToManySubProcessor
{
    protected const SUB_FORM_NAME = ContentBlocksController::RELATIONS_NAME;


    protected function setRepository(): void
    {
        $this->repository = \App(ServiceContentBlockRepository::class);
    }


    protected function SelectNotEmptyData(array &$listData): void
    {
        $listData = array_filter(
            $listData,
            static function($val) {
                foreach ($val as$k => $v){
                    if(!empty($v) && $k!=='publish' && $k!=='image_right')
                        return true;
                }
                return false;
            }
        );
    }

}
