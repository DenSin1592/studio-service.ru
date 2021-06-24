<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TargetAudiencePage;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\Repositories\Node\EloquentNodeRepository;

class TargetAudiencePagesController extends Controller
{
    public function __construct(
        private EloquentNodeRepository $nodeRepository,
        private Breadcrumbs $breadcrumbs,
    ){}


    public function edit($nodeId)
    {
        $page = $this->getPage($nodeId);
        $breadcrumbs = $this->breadcrumbs->getFor('structure_page.edit', $page->node);

        return view('admin.pages.target_audience_pages.edit')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('page', $page)
            ->with('node', $page->node);
    }


    public function update($nodeId)
    {
        $page = $this->getPage($nodeId);
        $page->fill(\Request::all());
        $page->save();

        if (\Request::get('redirect_to') == 'index') {
            $redirect = \Redirect::route('cc.structure.index');
        } else {
            $redirect = \Redirect::route('cc.target-audience-pages.edit', [$nodeId]);
        }
        return $redirect->with('alert_success', 'Страница обновлена');
    }


    private function getPage($nodeId): TargetAudiencePage
    {
        $node = $this->nodeRepository->findById($nodeId);

        if (is_null($node))
            \App::abort(404, 'Node not found');

        $page = \TypeContainer::getContentModelFor($node);
        if ($page instanceof TargetAudiencePage === false)
            \App::abort(404, 'Page not found');

        return $page;
    }
}
