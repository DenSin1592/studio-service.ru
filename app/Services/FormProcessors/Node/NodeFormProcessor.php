<?php

namespace App\Services\FormProcessors\Node;

use App\Models\Node;
use App\Services\FormProcessors\CreateUpdateFormProcessor;
use App\Services\FormProcessors\Features\AutoAlias;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\Validation\ValidableInterface;

class NodeFormProcessor extends CreateUpdateFormProcessor
{
    use AutoAlias;


    protected function prepareInputData(array $data): array
    {
        $data = $this->setAutoAlias($data);

        if (isset($data['type']) && $data['type'] == Node::TYPE_HOME_PAGE) {
            $data['alias'] = null;
        }

        return $data;
    }
}
