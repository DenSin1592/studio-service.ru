<?php

namespace App\Services\FormProcessors\Competence\SubProcessor;

use App\Http\Controllers\Admin\Relations\Competencies\ContentBlocksController;
use App\Services\FormProcessors\BaseOneToManySubProcessor;
use App\Services\Repositories\Competencies\CompetenceContentBlock\CompetenceContentBlockRepository;

final class ContentBlocks extends BaseOneToManySubProcessor
{
    protected const SUB_FORM_NAME = ContentBlocksController::RELATIONS_NAME;


    protected function setRepository(): void
    {
        $this->repository = \App(CompetenceContentBlockRepository::class);
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
