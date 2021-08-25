<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Breadcrumbs\Factory as Breadcrumbs;
use App\Services\Seo\MetaHelper;

class PrivacyController extends Controller
{
    public function __construct(
        private Breadcrumbs $breadcrumbs,
        private MetaHelper $metaHelper
    )
    {}

    public function __invoke()
    {
        $breadcrumbs = $this->breadcrumbs->init();
        $breadcrumbs->add('Политика конфиденциальности', route('privacy'));
        $metaData = $this->metaHelper->getRule()->metaForName('Политика конфиденциальности');

        return view('client.privacy.show')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('metaData', $metaData);
    }
}
