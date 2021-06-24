<?php

namespace App\Services\Validation\AdminRole;

use App\Services\Admin\Acl\Acl;
use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;

class AdminRoleValidator extends AbstractLaravelValidator
{

    public function __construct(
        ValidatorFactory $validatorFactory,
        private Acl $acl
    )
    {
        parent::__construct($validatorFactory);
    }


    protected function getRules(): array
    {
        return [
            'name' => ['required', "unique:admin_roles,name,{$this->currentId}"],
            'seo' => ['boolean'],
            'abilities' => 'subset:' . implode(',', $this->acl->abilities()->keys()->all()),
        ];
    }

    protected function getMessages(): array
    {
        return [
            'name.unique' => trans('Выбранное значение для :attribute уже существует.')
        ];
    }
}
