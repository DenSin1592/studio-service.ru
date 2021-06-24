<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \View('admin.session.login', [
            'title' => 'Авторизация',
            'incorrect' => false,
            'credentials' => ['username' => '', 'password' => ''],
            'remember' => true,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $credentials = \Request::only(['username', 'password']);
        $remember = \Request::has('remember');

        if (\Auth::attempt($credentials, $remember))
            return \Redirect::intended(route('cc.home'));

        return \View('admin.session.login', [
            'title' => 'Авторизация',
            'incorrect' => true,
            'credentials' => $credentials,
            'remember' => $remember,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        \Auth::logout();

        return \Redirect::route('cc.login');
    }
}
