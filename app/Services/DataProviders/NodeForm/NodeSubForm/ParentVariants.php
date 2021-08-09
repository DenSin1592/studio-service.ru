<?php

namespace App\Services\DataProviders\NodeForm\NodeSubForm;

use App\Services\DataProviders\BaseParentVariantsSubForm;
use App\Services\Repositories\Node\NodeRepository;

final class ParentVariants extends BaseParentVariantsSubForm
{
    protected const SUB_FORM_NAME = 'parent_variants';

    protected function setRepository(): void
    {
        $this->repository = \App(NodeRepository::class);
    }
}
