<?php namespace App\Services\Validation\AdminRole;

use App\Services\Admin\Acl\Acl;
use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;

class AdminRoleValidator extends AbstractLaravelValidator
{
    private Acl $acl;

    public function __construct(ValidatorFactory $validatorFactory, Acl $acl)
    {
        parent::__construct($validatorFactory);
        $this->acl = $acl;
    }

    protected function getRules()
    {
        return [
            'name' => ['required', "unique:admin_roles,name,{$this->currentId}"],
            'seo' => ['boolean'],
            'abilities' => 'subset:' . implode(',', $this->acl->abilities()->keys()->all()),
        ];
    }

    protected function getMessages()
    {
        return [
            'name.unique' => trans('Выбранное значение для :attribute ошибочно.')
        ];
    }
}
