<?php

namespace App\Services\Sitemap;

use App\Models\Node;
use App\Services\Repositories\Competencies\CompetenciesRepository;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Repositories\Offer\OfferRepository;
use App\Services\Repositories\OurWork\OurWorkRepository;
use App\Services\Repositories\Services\ServicesRepository;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

class SitemapGenerator
{
    private bool|string $siteMapXmlDate;

    private const  HIGH_PRIORITY = 1;
    private const  LOW_PRIORITY = 0.5;

    public function __construct(
        private NodeRepository $nodeRepository,
    ) {
        $this->siteMapXmlDate = date("Y-m-d");
    }

    /**
     *  Generate site map xml file.
     */
    public function generate()
    {
        $fileResource = fopen(public_path('sitemap.xml'), 'w');
        fwrite($fileResource, $this->printSiteMap());
        fclose($fileResource);
    }

    private function printSiteMap()
    {
        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0" encoding="utf-8');
        $xml->startElement('urlset');

        $xml->startAttribute('xmlns:xsi');
        $xml->text('http://www.w3.org/2001/XMLSchema-instance');
        $xml->endAttribute();

        $xml->startAttribute('xmlns');
        $xml->text('http://www.sitemaps.org/schemas/sitemap/0.9');
        $xml->endAttribute();

        $xml->startAttribute('xsi:schemaLocation');
        $xml->text(
            'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd'
        );
        $xml->endAttribute();

        $data = $this->getDataForSiteMap();

        foreach ($data as $element) {
            if (!isset($element['lastmod'])) {
                $element['lastmod'] = $this->siteMapXmlDate;
            }
            if (empty($element['priority'])) {
                $element['priority'] = self::HIGH_PRIORITY;
            }
            $this->getElement($xml, array('url' => $element));
        }
        $xml->endElement();

        return $xml->outputMemory();
    }


    private function getDataForSiteMap()
    {
        $nodeData = $this->nodeStructure();
        $catalogServiceData = $this->getCatalogData(ServicesRepository::class);
        $catalogCompetenceData = $this->getCatalogData(CompetenciesRepository::class);
        $catalogTargetAudienceData = $this->getCatalogData(TargetAudienceRepository::class);
        $offersData = $this->getCatalogData(OfferRepository::class);
        $projectData = $this->getCatalogData(OurWorkRepository::class);

        return array_merge($nodeData, $catalogServiceData, $catalogCompetenceData, $catalogTargetAudienceData, $offersData, $projectData);
    }


    private function nodeStructure(): array
    {
        $elementsList = [];
        $nodeList = $this->nodeRepository->getPublishedTree();

        foreach ($nodeList as $node){
            $elementsList = array_merge($elementsList, $this->getNodeData($node, self::HIGH_PRIORITY));
        }

        return $elementsList;
    }



    private function getNodeData(Node $node, $priority)
    {
        $contentModel = \TypeContainer::getContentModelFor($node);
        if (is_null($contentModel))
            return [];

        $nodeData[0] = [
            'loc' => \TypeContainer::getClientUrl($node),
            'priority' => $priority,
        ];

        if ($node->exists) {
            if ($contentModel->exists) {
                $lastMod = $contentModel->updated_at > $node->updated_at ? $contentModel->updated_at : $node->updated_at;
            } else {
                $lastMod = $node->updated_at;
            }
            $nodeData[0]['lastmod'] = $lastMod->format('Y-m-d');
        }

        foreach ($node->children as $child){
            $arrays = $this->getNodeData($child, self::LOW_PRIORITY);
            foreach ($arrays as $array){
                $nodeData[] = $array;
            }
        }

        return $nodeData;
    }



    private function getCatalogData(string $nameRepository): array
    {
        $data = [];

        $models = resolve($nameRepository)->getModelsForSiteMap();
        foreach($models as $model){

            $data[] = [
                'loc' => $model->url,
                'priority' => self::LOW_PRIORITY,
                'lastmod' => $model->updated_at->format('Y-m-d')
            ];
        }

        return $data;
    }

    private function getElement(\XMLWriter $xml, $data)
    {
        foreach ($data as $key => $val) {
            if (is_numeric($key)) {
                $key = 'key' . $key;
            }
            if (is_array($val)) {
                $xml->startElement($key);
                $this->getElement($xml, $val);
                $xml->endElement();
            } else {
                $xml->writeElement($key, $val);
            }
        }
    }
}
