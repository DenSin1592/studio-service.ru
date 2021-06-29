<?php

namespace App\Http\Controllers\Admin\Features;

trait UpdatePositions
{
    public function updatePositions()
    {
        $this->repository->updatePositions(\Request::get('positions', []));
        if (\Request::ajax())
            return \Response::json(['status' => 'alert_success']);
        return \Redirect::route(self::ROUTE_INDEX);
    }
}
