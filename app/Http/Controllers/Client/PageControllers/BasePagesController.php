<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Facades\TypeContainer;
use App\Http\Controllers\Controller;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Seo\MetaHelper;

abstract class BasePagesController extends Controller
{
    public function __construct(
        protected NodeRepository $repository,
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
        $authEditLink = TypeContainer::getContentUrl($node);

        return \View::make(static::VIEW_FOR_SHOW)
            ->with(compact(
                'page',
                'metaData',
                'authEditLink',
            ));
    }
}
