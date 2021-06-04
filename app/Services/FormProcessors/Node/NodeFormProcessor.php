<?php namespace App\Services\FormProcessors\Node;

use App\Models\Node;
use App\Services\FormProcessors\CreateUpdateFormProcessor;
use App\Services\FormProcessors\Features\AutoAlias;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\Validation\ValidableInterface;

class NodeFormProcessor extends CreateUpdateFormProcessor
{
    use AutoAlias;

    public function __construct(
        ValidableInterface $validator,
        CreateUpdateRepositoryInterface $repository
    ) {
        parent::__construct($validator, $repository);
    }


    protected function prepareInputData(array $data)
    {
        $data = $this->setAutoAlias($data);

        if (isset($data['type']) && $data['type'] == Node::TYPE_HOME_PAGE) {
            $data['alias'] = null;
        }

        return $data;
    }
}
