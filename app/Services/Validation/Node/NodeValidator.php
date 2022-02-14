<?php

namespace App\Services\Validation\Node;

use App\Services\StructureTypes\TypeContainer;
use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;
use Illuminate\Validation\Validator;

class NodeValidator extends AbstractLaravelValidator
{
    public function __construct(
        ValidatorFactory $validatorFactory,
        private TypeContainer $typeContainer)
    {
        parent::__construct($validatorFactory);
    }


    protected function getRules(): array
    {
        $parentId = \Arr::get($this->data, 'parent_id');
        if (is_null($parentId)) {
            $parentId = 'NULL';
        }

        $rules = [];
        $rules['name'] = "required";
        $rules['alias'] = ['nullable', "unique:nodes,alias,{$this->currentId},id,parent_id,{$parentId}"];
        $rules['parent_id'] = ['nullable', "exists:nodes,id"];

        $typeList = $this->typeContainer->getEnabledTypeList($this->currentId);
        $rules['type'] = ["required", "in:" . implode(',', array_keys($typeList))];

        return $rules;
    }
}
