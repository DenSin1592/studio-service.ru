<?php

namespace App\Services\FormProcessors\Service;

use App\Services\FormProcessors\CreateUpdateFormProcessor;
use App\Services\FormProcessors\Features\AutoAlias;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\Validation\ValidableInterface;

class ServiceFormProcessor extends CreateUpdateFormProcessor
{
    use AutoAlias;

    public function __construct(
        ValidableInterface $validator,
        CreateUpdateRepositoryInterface $repository
    ) {
        parent::__construct($validator, $repository);
    }

    protected function prepareInputData(array $data): array
    {
        $data = $this->setAutoAlias($data);
        return $data;
    }
}
