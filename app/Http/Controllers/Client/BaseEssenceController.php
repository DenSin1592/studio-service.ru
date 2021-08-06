<?php


namespace App\Http\Controllers\Client;

use App\Services\Breadcrumbs\Factory as Breadcrumbs;
use App\Services\Seo\MetaHelper;

abstract class BaseEssenceController
{
    protected $repository;
    protected MetaHelper $metaHelper;
    protected Breadcrumbs $breadcrumbs;

    abstract protected function getBreadCrumbs(string $h1);
    abstract protected function setRepository(): void;

    public function __construct(
         MetaHelper $metaHelper,
         Breadcrumbs $breadcrumbs,
    ){
      $this->metaHelper = $metaHelper;
      $this->breadcrumbs = $breadcrumbs;
      $this->setRepository();
    }
    public function show($url)
    {
        $model = $this->repository->getModelforShowByAliasOrFail($url);

        $metaData = $this->metaHelper->getRule()->metaForObject($model);

        $breadcrumbs = $this->getBreadCrumbs($metaData['h1']);

        $authEditLink = route(static::AUTH_EDIT_LINK, $model->id);

        return \View::make(static::VIEW_FOR_SHOW)
            ->with(compact(
                'model',
                'metaData',
                'authEditLink',
                'breadcrumbs',
            ));
    }

    public function getModelsForHomePage()
    {
        return $this->repository->getModelsForHomePage();
    }
}
