<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Node;
use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\Seo\MetaHelper;

class TargetAudiencePageController extends Controller
{
    private EloquentNodeRepository $nodeRepository;
    private MetaHelper $metaHelper;

    public function __construct(
        EloquentNodeRepository $nodeRepository,
        MetaHelper $metaHelper
    )
    {
        $this->nodeRepository = $nodeRepository;
        $this->metaHelper = $metaHelper;
    }


    public function show(): \Illuminate\Contracts\View\View
    {
        $node = $this->nodeRepository->findByType(Node::TYPE_TARGET_AUDIENCE_PAGE, true);
        if (is_null($node))
            abort(404);

        $page = \TypeContainer::getContentModelFor($node);
        $page->node()->associate($node);

        $metaData = $this->metaHelper->getRule()->metaForObject($page, $node->name);

        return \View::make('client.target_audience_page.show')
            ->with('page', $page)
            ->with($metaData)
            ->with(['authEditLink' => route('cc.home-pages.edit', $page->node_id)]);
    }
}
