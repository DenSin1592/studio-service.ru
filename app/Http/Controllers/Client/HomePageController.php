<?php namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\Node;
use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\Seo\MetaHelper;

class HomePageController extends Controller
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
        $node = $this->nodeRepository->findByType(Node::TYPE_HOME_PAGE, true);
        if (is_null($node))
            abort(404);

        $homePage = \TypeContainer::getContentModelFor($node);
        $homePage->node()->associate($node);

        $metaData = $this->metaHelper->getRule()->metaForObject($homePage, $node->name);

        return \View::make('client.home_page.show')
            ->with('homePage', $homePage)
            ->with($metaData)
            ->with($homePage ? ['authEditLink' => route('cc.home-pages.edit', $homePage->node_id)] : []);
    }
}
