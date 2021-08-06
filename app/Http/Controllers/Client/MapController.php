<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\MapBuilder\MapBuilder;
use App\Services\Seo\MetaHelper;
use App\Services\Breadcrumbs\Factory as Breadcrumbs;

class MapController extends Controller
{
    public function __construct(
        private MapBuilder $mapBuilder,
        private MetaHelper $metaHelper,
        private Breadcrumbs $breadcrumbs
    ){}

    public function __invoke()
    {
        $metaData = $this->metaHelper->getRule()->metaForName('Карта сайта');
        $breadcrumbs = $this->breadcrumbs->init();
        $breadcrumbs->add('Карта сайта');
        $mapStructure = $this->mapBuilder->buildStructure();

        return view('client.sitemap.show')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('metaData',$metaData)
            ->with('mapStructure', $mapStructure);
    }
}
