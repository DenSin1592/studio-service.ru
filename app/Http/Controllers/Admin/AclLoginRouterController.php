<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\Menu\Menu;

class AclLoginRouterController extends Controller
{


    public function __construct(
        private Menu $mainMenu
    ){}


    public function index()
    {
        $redirectToUrl = $this->mainMenu->getFirstAvailableUrl();

        if ($redirectToUrl !== null)
            return redirect()->to($redirectToUrl);

        \Auth::logout();
        return redirect()->route('cc.login')->with('alert_error', trans('alerts.user_has_no_access'));
    }
}
