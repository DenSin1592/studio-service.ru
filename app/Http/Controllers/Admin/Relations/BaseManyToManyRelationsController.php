<?php


namespace App\Http\Controllers\Admin\Relations;

use App\Http\Controllers\Controller;
use App\Services\Repositories\BaseRepository;
use Illuminate\Http\JsonResponse;

abstract class BaseManyToManyRelationsController extends Controller
{
    protected BaseRepository $repository;

    abstract protected function setRepository(): void;

    public function __construct()
    {
        $this->setRepository();
    }

    public static function RELATION_BLOCK_VIEW_DEPENDENCIES(): array
    {
        return [
            'blockName' => static::BLOCK_NAME,
            'relationsName' => static::RELATIONS_NAME,
            'routeEdit' => static::ROUTE_EDIT,
            'routeAvailable' => static::ROUTE_AVAILABLE,
            'routeRebuildCurrent' => static::ROUTE_REBUILD_CURRENT,
        ];
    }

    public static function RELATION_CURRENT_VIEW_DEPENDENCIES(): array
    {
        return [
            'relationsName' => static::RELATIONS_NAME,
            'routeEdit' => static::ROUTE_EDIT,
        ];
    }


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

        return \Response::json(['elements' => $elementsList]);
    }


    public function rebuildCurrent(): JsonResponse
    {
        $elements = \Request::get('elements');
        if (!is_array($elements)) {
            $elements = [];
        }

        $ids = array_map(fn($e) => \Arr::get($e, 'id'), $elements);

        $models = $this->repository->allByIdsInSequence($ids);

        $content = \View::make(
            'admin.shared._relations._many_to_many._current',
            array_merge(self::RELATION_CURRENT_VIEW_DEPENDENCIES(), ['models' => $models])
        )->render();

        return \Response::json(['content' => $content]);
    }
}
