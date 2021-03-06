<?php

namespace App\Services\DataProviders;

use App\Services\Repositories\BaseRepository;

abstract class BaseSubForm implements BaseSubFormInterface
{
    protected BaseRepository $repository;

    abstract protected function setRepository(): void;

    public function __construct()
    {
        $this->setRepository();
    }
}
