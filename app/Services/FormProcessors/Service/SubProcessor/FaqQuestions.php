<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Http\Controllers\Admin\Relations\Services\FaqQuestionsController;
use App\Services\FormProcessors\BaseOneToManySubProcessor;
use App\Services\Repositories\Services\ServiceFaqQuestion\ServiceFaqQuestionRepository;


final class FaqQuestions extends BaseOneToManySubProcessor
{
    protected const SUB_FORM_NAME = FaqQuestionsController::RELATIONS_NAME;


    protected function setRepository(): void
    {
        $this->repository = \App(ServiceFaqQuestionRepository::class);
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
