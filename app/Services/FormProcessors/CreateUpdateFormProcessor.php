<?php

namespace App\Services\FormProcessors;

use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\Validation\ValidableInterface;

abstract class CreateUpdateFormProcessor implements CrudFormProcessorInterface
{
    public function __construct(
        protected ValidableInterface $validator,
        protected CreateUpdateRepositoryInterface $repository
    ){}


    public function create(array $data = []): ?\Eloquent
    {
        $data = $this->prepareInputData($data);
        if (!$this->validator->with($data)->passes())
            return null;

        $instance = $this->repository->create($data);
        $this->afterSuccess($instance, $data);

        return $instance;


    }

    /**
     * Update an element.
     */
    public function update($instance, array $data = []): bool
    {
        $data = $this->prepareInputData($data);
        $this->validator->setCurrentId($instance->id);
        if (!$this->validator->with($data)->passes())
            return false;

        $this->repository->update($instance, $data);
        $this->afterSuccess($instance, $data);
        return true;

    }

    /**
     * Get errors.
     */
    public function errors(): array
    {
        return $this->validator->errors();
    }

    /**
     * Prepare input data before validation and creating/updating.
     */
    protected function prepareInputData(array $data): array
    {
        return $data;
    }

    /**
     * Do something after instance.
     */
    protected function afterSuccess($instance, array $data)
    {
        // rewrite this method if needed
    }
}
