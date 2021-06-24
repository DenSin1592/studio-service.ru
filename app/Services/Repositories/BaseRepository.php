<?php

namespace App\Services\Repositories;

abstract class BaseRepository
{

    public function __construct(
        protected $model
    ){}


    protected function getModel(): \Eloquent
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


    public function newInstance(array $data = [])
    {
        return $this->getModel()->fill($data);
    }


    public function all()
    {
        return $this->getModel()->all();
    }

    public function find(int $id)
    {
        return $this->getModel()->find($id);
    }


    public function delete($role)
    {
        return $role->delete();
    }


    public function getTotalCount()
    {
        return $this->getModel()->count();
    }
}
