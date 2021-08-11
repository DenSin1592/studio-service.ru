<?php

namespace App\Services\Repositories\Review;

use App\Models\Review;
use App\Services\Repositories\BaseFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class ReviewRepository extends BaseFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new Review();
    }

    public function getModelsForHomePage()
    {
        return $this->getModel()
            ->with(['services', /*'images' => static function ($q){
                $q->orderBy('position')
                    ->limit(1);
            }*/])
            ->where('on_home_page', true)
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }
}
