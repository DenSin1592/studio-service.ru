<?php

namespace App\Services\Composers;

class CurrentAdminUserComposer
{
    public function compose($view)
    {
        $view->with('currentAdminUser', \Auth::user());
    }
}
