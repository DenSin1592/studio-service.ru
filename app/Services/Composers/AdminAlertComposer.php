<?php

namespace App\Services\Composers;

class AdminAlertComposer
{
    public function compose($view)
    {
        foreach (['alert_success', 'alert_error'] as $status) {
            $view->with($status, \Session::get($status));
        }
    }
}
