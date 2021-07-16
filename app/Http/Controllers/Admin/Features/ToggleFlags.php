<?php

namespace App\Http\Controllers\Admin\Features;

trait ToggleFlags
{

    public function toggleAttribute($id, $attribute)
    {
        if (!in_array($attribute, ['publish', 'menu_top', 'menu_bottom', 'on_home_page']))
            \App::abort(404, "Not allowed to toggle this attribute");

        $node = $this->repository->findById($id);
        if (is_null($node))
            \App::abort(404, 'Model not found');

        $this->repository->toggleAttribute($node, $attribute);
        return $this->toggleFlagResponse(
            route(self::ROUTE_TOGGLE_ATTRIBUTE, [$id, $attribute]),
            $node,
            $attribute
        );
    }


    protected function toggleFlagResponse($action, $modelInstance, $attribute): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        if (!\Request::ajax())
            return \Redirect::back();

        $view = 'admin.shared._list_flag';
        $newFlagView = view($view)
            ->with('element', $modelInstance)
            ->with('action', $action)
            ->with('attribute', $attribute)
            ->render();

        return \Response::json(['new_icon' => $newFlagView]);
    }
}
