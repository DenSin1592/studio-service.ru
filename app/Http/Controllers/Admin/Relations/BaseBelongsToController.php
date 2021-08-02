<?php

namespace App\Http\Controllers\Admin\Relations;

use App\Http\Controllers\Controller;
use App\Services\Repositories\BaseFeatureRepository;

abstract class BaseBelongsToController extends Controller
{
    protected const VARIANTS_SEARCH_LIMIT = 20;

    abstract protected function setRepository(): void;

    protected BaseFeatureRepository $repository;

    public function __construct()
    {
        $this->setRepository();
    }

    public function getSearchedValues(): \Illuminate\Http\JsonResponse
    {
        if (!\Request::ajax())
            \App::abort(404);

        $searchString = !empty(\Request::get('searchString')) ? \Request::get('searchString') : '';
        $page = !empty(\Request::get('page')) ? \Request::get('page') : 1;

        $searchResultsData = $this->repository->getEssencesBySearchString(
            $searchString,
            $page,
            static::VARIANTS_SEARCH_LIMIT
        );

        $results = [];
        foreach ($searchResultsData['items'] as $element) {
            $results[] = [
                'id' => $element->id,
                'text' => "$element->name [id = $element->id]",
                'edit_link' => !empty(\Request::get('editUrlName')) ? route(\Request::get('editUrlName'), $element->id): '',
                'site_link' => (($element->publish) && !empty(\Request::get('editUrlName'))) ? route(\Request::get('showOnSiteUrlName'), $element->alias): '#',
            ];
        }

        $data = [
            'results' => $results,
            'pagination' => [
                "more" => ($searchResultsData['total'] > $searchResultsData['page'] * $searchResultsData['limit']),
            ]
        ];

        return \Response::json($data);
    }
}
