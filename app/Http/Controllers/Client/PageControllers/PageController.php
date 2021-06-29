<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Controller;
use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\Seo\MetaHelper;

abstract class PageController extends Controller
{
    public function __construct(
        protected EloquentNodeRepository $repository,
        protected MetaHelper $metaHelper
    ){}

    protected function show()
    {
        $node = $this->repository->findByType(static::TYPE_PAGE, true);
        if (is_null($node))
            \App::abort(404);

        $page = \TypeContainer::getContentModelFor($node);
        $page->node()->associate($node);

        $metaData = $this->metaHelper->getRule()->metaForObject($page, $node->name);
        $authEditLink = route('cc.home-pages.edit', $page->node_id);

        return \View::make(static::VIEW_FOR_SHOW)
            ->with(compact(
                'page',
                'metaData',
                'authEditLink',
            ));
    }
}
