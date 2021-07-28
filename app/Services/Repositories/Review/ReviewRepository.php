<?php

namespace App\Services\Repositories\Review;

use App\Models\Review;
use App\Services\Repositories\BaseFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;
use Illuminate\Database\Eloquent\Model;

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
            ->with('services', 'images')
            ->where('on_home_page', true)
            ->orderBy('position')
            ->get();
    }
}
