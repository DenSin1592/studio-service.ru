<?php

namespace App\Services\DataProviders\NodeForm\NodeSubForm;

use App\Models\Node;
use App\Services\DataProviders\BaseParentVariantsSubForm;
use App\Services\Repositories\Node\NodeRepository;
use Illuminate\Database\Eloquent\Model;

final class ParentVariants extends BaseParentVariantsSubForm
{
    protected const SUB_FORM_NAME = 'parent_variants';

    protected function setRepository(): void
    {
        $this->repository = \App(NodeRepository::class);
    }

    public function provideData(Model $model, array $oldInput): array
    {
        $parentVariants = $this->repository->getParentVariants($model, '[Корень]');
        unset($parentVariants[Node::HOME_PAGE_ID]);
        return [self::SUB_FORM_NAME => $parentVariants];
    }
}
