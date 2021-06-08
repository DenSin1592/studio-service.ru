<?php namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use App\Models\Node;
use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\Seo\MetaHelper;

class HomePageController extends Controller
{
    const DEFAULT_PAGE_NAME = 'Главная';

    private $nodeRepository;
    private $metaHelper;

    public function __construct(
        EloquentNodeRepository $nodeRepository,
        //MetaHelper $metaHelper
    ) {
        $this->nodeRepository = $nodeRepository;
        //$this->metaHelper = $metaHelper;
    }

    public function show()
    {
        /** @var Node $node */
        $node = $this->nodeRepository->findByType(Node::TYPE_HOME_PAGE, true);
        if (!is_null($node)) {
            /** @var HomePage $homePage */
            $homePage = \TypeContainer::getContentModelFor($node);
            $homePage->node()->associate($node);
            //$metaData = $this->metaHelper->getRule()->metaForObject($homePage, $node->name);
        } else {
            $homePage = null;
            //$metaData = $this->metaHelper->getRule()->metaForName(self::DEFAULT_PAGE_NAME);
        }

        return \View::make('client.home_page.show')
            ->with('homePage', $homePage)
            //->with($metaData)
            ->with($homePage ? ['authEditLink' => route('cc.home-pages.edit', $homePage->node_id)] : [])
            ;
    }
}
