<?php

namespace App\Services\FormProcessors;

use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\Validation\ValidableInterface;

abstract class BaseFormProcessor implements CrudFormProcessorInterface
{
    private array $subProcessorList = [];

    public function __construct(
        protected ValidableInterface $validator,
        protected CreateUpdateRepositoryInterface $repository
    ){}


    public function addSubProcessor(SubProcessor $subProcessor)
    {
        $this->subProcessorList[] = $subProcessor;
    }


    protected function prepareInputData(array $data)
    {
        foreach ($this->subProcessorList as $subProcessor) {
            $data = $subProcessor->prepareInputData($data);
        }

        return $data;
    }


    public function create(array $data = []): ?\Eloquent
    {

        $data = $this->prepareInputData($data);
        if (!$this->validator->with($data)->passes())
            return null;

        $instance = null;
        \DB::transaction(function () use (&$instance, $data) {
            $instance = $this->repository->create($data);
            $this->afterSuccess($instance, $data);
        });

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

        \DB::transaction(function () use (&$instance, $data) {
            $this->repository->update($instance, $data);
            $this->afterSuccess($instance, $data);
        });

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
     * Do something after instance.
     */
    protected function afterSuccess($instance, array $data)
    {
        foreach ($this->subProcessorList as $subProcessor) {
            $subProcessor->save($instance, $data);
        }
    }
}
