<?php

namespace App\Services\FormProcessors\Node;

use App\Services\FormProcessors\BaseFormProcessor;
use App\Services\FormProcessors\Features\AutoAlias;

final class NodeFormProcessor extends BaseFormProcessor
{
    use AutoAlias;

    protected function prepareInputData(array $data)
    {
        $data = $this->setAutoAlias($data);

        if (empty($data['parent_id'])) {
            $data['parent_id'] = null;
        }

        if (isset($data['type'])) {
            $typeObject = \TypeContainer::getTypeList()[$data['type']];
            if ($typeObject->getUnique()) {
                $data['alias'] = null;
            }
        }

        return parent::prepareInputData($data);
    }}

