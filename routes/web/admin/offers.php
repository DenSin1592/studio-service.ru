<?php

Route::prefix('offers')->name('offers.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\OffersController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\OffersController@updatePositions')->name('update-positions');

    Route::namespace('Relations\Offers')->group(function () {

        Route::prefix('services')->name('services.')->group(function () {
            Route::get('search', 'ServicesController@getSearchedValues')->name('search');
        });
        Route::prefix('target-audiences')->name('target-audiences.')->group(function () {
            Route::get('search', 'TargetAudiencesController@getSearchedValues')->name('search');
        });
        Route::prefix('content-blocks')->name('content-blocks.')->group(function () {
            Route::get('create', 'ContentBlocksController@create')->name('create');
        });
        Route::prefix('tabs')->name('tabs.')->group(function () {
            Route::get('create', 'TabsController@create')->name('create');
        });

    });

});
Route::resource('offers', 'EssenceControllers\OffersController')->except('show');


