<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::prefix(config('app.admin_path'))->name('cc.')->namespace('Admin')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', 'SessionsController@create')->name('login');
        Route::post('login', 'SessionsController@store')->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('logout', 'SessionsController@destroy')->name('logout');

        require_once 'web/admin/access_control.php';
        require_once 'web/admin/settings.php';
        require_once 'web/admin/structure.php';
    });
});

Route::namespace('Client')->group(function () {
    Route::get('/', 'HomePageController@show')->name('home');
    Route::get('/dlya-kogo', 'TargetAudiencePageController@show')->name('target-audience');
});
