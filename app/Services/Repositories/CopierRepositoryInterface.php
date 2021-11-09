<?php

namespace App\Services\Repositories;

use Illuminate\Database\Eloquent\Model;

interface CopierRepositoryInterface
{
    public function getTheCountOfEntitysWithTheSameName(string $name): int;
}
