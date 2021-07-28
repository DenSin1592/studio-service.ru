<?php

namespace App\Services\DataProviders\OurWorkForm\OurWorkSubForm;

use App\Http\Controllers\Admin\Relations\OurWorks\ImagesController;
use App\Services\DataProviders\BaseSubForm;
use App\Services\Eloquent\CollectionExtractor;
use App\Services\Repositories\OurWork\OurWorkImage\OurWorkImageRepository;
use Illuminate\Database\Eloquent\Model;

class Images extends BaseSubForm
{
    use CollectionExtractor;

    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    public function __construct(
        private OurWorkImageRepository $repository
    ){}

    public function provideData(Model $model, array $oldInput): array
    {
        $models = $this->extractFromArray(
             fn() => $this->repository->newInstance(),
            $oldInput,
            self::SUB_FORM_NAME,
            $this->repository->allForModel($model)
        );

        return [self::SUB_FORM_NAME => $models];
    }
}
