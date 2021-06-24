<?php

namespace App\Http\Controllers\Admin\Features;

trait ToggleFlags
{
    /**
     * Response for toggling a flag.
     *
     * @param $action
     * @param $modelInstance
     * @param $attribute
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
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
