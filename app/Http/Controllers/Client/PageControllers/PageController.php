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

    abstract protected function getTypePage(): string;

    abstract protected function getView(): string;

    protected function show()
    {
        $node = $this->repository->findByType($this->getTypePage(), true);
        if (is_null($node))
            \App::abort(404);

        $page = \TypeContainer::getContentModelFor($node);
        $page->node()->associate($node);

        $metaData = $this->metaHelper->getRule()->metaForObject($page, $node->name);
        $authEditLink = route('cc.home-pages.edit', $page->node_id);

        return \View::make($this->getView())
            ->with(compact(
                'page',
                'metaData',
                'authEditLink',
            ));
    }
}
