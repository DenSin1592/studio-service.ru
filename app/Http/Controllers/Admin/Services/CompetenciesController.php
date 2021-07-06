<?php

namespace App\Http\Controllers\Admin\Services;

use App\Services\Repositories\Competencies\CompetenciesRepository;
use Arr;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Request;
use Response;


class CompetenciesController extends Controller
{
    public function __construct(
        private CompetenciesRepository $repository
    ){}


    public function available(): JsonResponse
    {
        $elements = $this->repository->all();

        $elementsList = [];
        foreach ($elements as $element) {
            $elementsList[] = [
                'id' => $element->id,
                'name' => $element->name,
                'listName' => $element->name,
            ];
        }

        return Response::json(['elements' => $elementsList]);
    }


    public function rebuildCurrent(): JsonResponse
    {
        $elements = Request::get('elements');
        if (!is_array($elements)) {
            $elements = [];
        }

        $ids = array_map(fn($e) => Arr::get($e, 'id'), $elements);

        $models = $this->repository->allByIdsInSequence($ids);
        $content = \View::make('admin.services._competencies._current', [
            'models' => $models,
        ])->render();

        return Response::json(['content' => $content]);
    }

}
