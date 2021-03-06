<?php namespace App\Http\Controllers\Client\DynamicPages;

use App\Models\Node;
use App\Models\TextPage;

class TextPagesSubController extends DynamicPagesSubController
{
    public function getPage(Node $node, TextPage $textPage)
    {
        $metaData = $this->metaHelper->getRule()->metaForObject($textPage, $node->name);
        $breadcrumbs = $this->getBreadcrumbs($node);
        $authEditLink = $this->typeContainer->getContentUrl($node);

        return view('client.text_page.show')
            ->with('textPage', $textPage)
            ->with('metaData', $metaData)
            ->with('breadcrumbs', $breadcrumbs)
            ->with('authEditLink', $authEditLink);
    }
}
