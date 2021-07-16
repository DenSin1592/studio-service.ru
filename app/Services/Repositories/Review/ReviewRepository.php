<?php

namespace App\Services\Repositories\Review;

use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\RepositoryFeatures\Attribute\EloquentAttributeToggler;

class ReviewRepository extends BaseRepository implements CreateUpdateRepositoryInterface
{
    public function __construct(
        private EloquentAttributeToggler $attributeToggler,
        protected $model
    ){
        parent::__construct($model);
    }

    public function toggleAttribute($model, $attribute)
    {
        $this->attributeToggler->toggleAttribute($model, $attribute);

        return $model;
    }
}
