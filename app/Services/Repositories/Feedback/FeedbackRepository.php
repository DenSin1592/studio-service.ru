<?php

namespace App\Services\Repositories\Feedback;

use App\Models\Feedback;
use App\Services\Repositories\BaseRepository;

class FeedbackRepository extends BaseRepository
{
    protected function setModel(): void
    {
        $this->model = new Feedback();
    }
}
