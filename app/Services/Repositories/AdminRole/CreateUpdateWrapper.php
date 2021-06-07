<?php namespace App\Services\Repositories\AdminRole;

use App\Services\Repositories\CreateUpdateRepositoryInterface;

class CreateUpdateWrapper implements CreateUpdateRepositoryInterface
{
    private AdminRoleRepository $repository;

    public function __construct(AdminRoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    public function update($instance, array $data)
    {
        return $this->repository->update($instance, $data);
    }
}