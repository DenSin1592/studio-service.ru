<?php

namespace App\Services\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements CreateUpdateRepositoryInterface
{
    protected Model $model;


    public function __construct()
    {
        $this->setModel();
    }


    abstract protected function setModel(): void;


    protected function getModel(): Model
    {
        return clone $this->model;
    }


    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }


    public function update($model, array $data)
    {
        return $model->update($data);
    }


    public function findById(int $id)
    {
        return $this->getModel()->find($id);
    }


    public function findByIdOrFail(int $id)
    {
        return $this->getModel()->findOrFail($id);
    }


    public function newInstance(array $data = [])
    {
        return $this->getModel()->fill($data);
    }


    public function all()
    {
        return $this->getModel()->all();
    }


    public function delete($model)
    {
        return $model->delete();
    }
}
