<?php


namespace App\Http\Controllers\Admin\Relations;


use App\Services\Repositories\BaseRepository;
use Illuminate\Http\JsonResponse;

abstract class BaseOneToManyController
{
    protected BaseRepository $repository;

    abstract protected function setRepository(): void;

    public function __construct()
    {
        $this->setRepository();
    }

    public function create(): JsonResponse
    {
        $key = \Request::get('key');
        $element = $this->repository->newInstance();
        $viewElement = \View(
            static::VIEW_ELEMENT_NAME,
            [
                'key' => $key,
                'element' => $element,
                'relation' => static::RELATIONS_NAME,
            ]
        )->render();

        return \Response::json(['element' => $viewElement]);
    }
}
