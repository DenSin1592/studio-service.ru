<?php

namespace App\Services\Repositories;

use App\Models\Review;
use App\Services\Pagination\FlexPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository
{
    protected const POSITION_STEP = 10;
    protected FlexPaginator $flexPaginator;

    public function __construct(
        protected $model
    ){
        $this->flexPaginator = \App(FlexPaginator::class);
    }


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


    public function delete($model)
    {
        return $model->delete();
    }


    public function getTotalCount()
    {
        return $this->getModel()->count();
    }


    public function allByPage($page, $limit): array
    {
        $query = $this->getModel()->query();

        $total = $query->count();
        $items = $query->skip($limit * ($page - 1))
            ->take($limit)
            ->get();

        return [
            'page' => $page,
            'limit' => $limit,
            'items' => $items,
            'total' => $total,
        ];
    }

    /**
     * @return LengthAwarePaginator
     */
    public function paginate(): LengthAwarePaginator
    {
        return $this->flexPaginator->make(
            function ($page, $limit) {
                return $this->allByPage($page, $limit);
            },
            'review-pagination-page',
            'review-pagination-limit'
        );
    }
}
