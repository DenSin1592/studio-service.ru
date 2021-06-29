<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Http\Controllers\Controller;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\Repositories\Node\NodeRepository;

abstract class BasePagesController extends Controller
{
    protected \Eloquent $modelPage;

    public function __construct(
        protected NodeRepository $nodeRepository,
        private Breadcrumbs $breadcrumbs,
    ){
        $this->installModelPage();
    }

    abstract protected function installModelPage(): void;

    public function edit($nodeId)
    {
        $page = $this->getPage($nodeId);
        $breadcrumbs = $this->breadcrumbs->getFor('structure.edit', $page->node);

        return view(static::VIEW_FOR_EDIT)
            ->with('breadcrumbs', $breadcrumbs)
            ->with('page', $page)
            ->with('node', $page->node);
    }


    public function update($nodeId)
    {
        $page = $this->getPage($nodeId);
        $page->fill(\Request::all());
        $page->save();

        if (\Request::get('redirect_to') === 'index') {
            $redirect = \Redirect::route('cc.structure.index');
        } else {
            $redirect = \Redirect::route(static::ROUTE_EDIT, [$nodeId]);
        }
        return $redirect->with('alert_success', 'Страница обновлена');
    }


    private function getPage($nodeId): \Eloquent
    {
        $node = $this->nodeRepository->findById($nodeId);
        if (is_null($node))
            \App::abort(404, 'Node not found');

        $page = \TypeContainer::getContentModelFor($node);
        if (!$page instanceof $this->modelPage)
            \App::abort(404, 'Page not found');

        return $page;
    }
}
