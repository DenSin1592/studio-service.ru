<?php

namespace App\Services\Repositories\Feedback;

use App\Models\Feedback;
use App\Services\Repositories\BaseFeatureRepository;

class FeedbackRepository extends BaseFeatureRepository
{
    protected function setModel(): void
    {
        $this->model = new Feedback();
    }

    protected function allByPage($page, $limit): array
    {
        $query = $this->getModel()->query();

        $total = $query->count();
        $items = $query->skip($limit * ($page - 1))
            ->orderBy('id')
            ->take($limit)
            ->get();

        return [
            'page' => $page,
            'limit' => $limit,
            'items' => $items,
            'total' => $total,
        ];
    }
}
