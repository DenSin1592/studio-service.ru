<?php

namespace App\Services\DataProviders\TargetAudienceForm\TargetAudienceSubForm;

use App\Services\DataProviders\BaseParentVariantsSubForm;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

final class ParentVariants extends BaseParentVariantsSubForm
{
    protected const SUB_FORM_NAME = 'parent_variants';

    protected function setRepository(): void
    {
        $this->repository = \App(TargetAudienceRepository::class);
    }
}
