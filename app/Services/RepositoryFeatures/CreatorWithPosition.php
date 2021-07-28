<?php


namespace App\Services\RepositoryFeatures;


trait CreatorWithPosition
{
    public function create(array $data)
    {
        if (empty($data['position'])) {
            $maxPosition = $this->getModel()->max('position');
            if (is_null($maxPosition)) {
                $maxPosition = 0;
            }
            $data['position'] = $maxPosition + self::POSITION_STEP;
        }

        return parent::create($data);
    }
}
