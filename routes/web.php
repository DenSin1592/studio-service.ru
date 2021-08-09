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

        Route::get('/', 'AclLoginRouterController@index')->name('home');

        Route::middleware('acl.admin')->group(function () {
            require_once 'web/admin/access_control.php';
            require_once 'web/admin/competencies.php';
            require_once 'web/admin/feedback.php';
            require_once 'web/admin/offers.php';
            require_once 'web/admin/our_works.php';
            require_once 'web/admin/reviews.php';
            require_once 'web/admin/services.php';
            require_once 'web/admin/settings.php';
            require_once 'web/admin/structure.php';
            require_once 'web/admin/target_audiences.php';
        });

        // all others should show 404 page for admin
        Route::any('/{url}', static function (){ \App::abort(404, 'Unknown route'); })->where('url', '.*');
    });

});

Route::namespace('Client')->group(function () {

    Route::namespace('PageControllers')->group(function () {
        Route::get('/', 'HomePageController@show')->name('home');
        Route::get('/dlya-kogo', 'TargetAudiencePageController@show')->name('target-audiences');
        Route::get('/kompetencii', 'CompetencePageController@show')->name('competencies');
        Route::get('/uslugi', 'ServicePageController@show')->name('services');
        //Route::get('/proekty', 'OurWorkPageController@show')->name('our-works');
        //Route::get('/otzyvy', 'ReviewPageController@show')->name('reviews');
    });

    Route::namespace('EssenceControllers')->group(function () {
        Route::get('/dlya-kogo/{url}', 'TargetAudienceController@show')->name('target-audience');
        Route::get('/uslugi/{url}', 'ServiceController@show')->name('service');
        Route::get('/kompetencii/{url}', 'CompetenceController@show')->name('competence');
        Route::get('/proekty/{url}', 'OurWorkController@show')->name('our-work');
        Route::get('/offery/{url}', 'OfferController@show')->name('offer');
    });

    Route::post('feedback', 'FeedbackController')->name('feedback');
    Route::get('privacy', 'PrivacyController')->name('privacy');
    Route::get('sitemap', 'MapController')->name('sitemap');

    Route::get('/{url}', 'DynamicPagesController@show')->name('dynamic_page')->where('url', '.*');
});
