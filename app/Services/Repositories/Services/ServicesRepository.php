<?php

namespace App\Services\Repositories\Services;

use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\RepositoryFeatures\Attribute\EloquentAttributeToggler;
use App\Services\RepositoryFeatures\Attribute\PositionUpdater;

class ServicesRepository extends BaseRepository implements CreateUpdateRepositoryInterface
{
    public function __construct(
        private EloquentAttributeToggler $attributeToggler,
        private PositionUpdater $positionUpdater,
        protected $model
    ){
        parent::__construct($model);
    }


    public function create(array $data)
    {
        if (empty($data['position'])) {
            $maxPosition = $this->getModel()->max('position');
            if (is_null($maxPosition)) {
                $maxPosition = 0;
            }
            $data['position'] = $maxPosition + self::POSITION_STEP;
        }

        return $this->getModel()->create($data);
    }


    public function updatePositions(array $positions)
    {
        $this->positionUpdater->updatePositions($this->getModel(), $positions);
    }


    public function toggleAttribute($model, $attribute)
    {
        $this->attributeToggler->toggleAttribute($model, $attribute);

        return $model;
    }


    public function all()
    {
        return $this->getModel()->orderBy('position')->get();

    }
}
