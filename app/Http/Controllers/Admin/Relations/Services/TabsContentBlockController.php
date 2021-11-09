<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Services\ServiceTabContentTab\ServiceTabContentBlockRepository;
use Illuminate\Http\JsonResponse;

final class TabsContentBlockController extends BaseOneToManyController
{
    public const RELATIONS_PARENT_NAME = TabsController::RELATIONS_NAME;
    public const RELATIONS_NAME = 'blockable';
    public const ROUTE_CREATE = 'cc.services.tabs.create.content';
    public const VIEW_ELEMENT_NAME = 'admin.essence.services._tabs._content_block._content';

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceTabContentBlockRepository::class);
    }

    public function create(): JsonResponse
    {
        $key = \Request::get('key');
        $parentKey = \Request::get('parentKey');
        $element = $this->repository->newInstance();
        $viewElement = \View(
            self::VIEW_ELEMENT_NAME,
            [
                'key' => $parentKey,
                'key_two_level' => $key,
                'element' => $element,
                'relation' => self::RELATIONS_PARENT_NAME,
                'child_relation' => self::RELATIONS_NAME
            ]
        )->render();

        return \Response::json(['element' => $viewElement]);
    }
}
