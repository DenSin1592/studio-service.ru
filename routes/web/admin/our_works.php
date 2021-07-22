<?php

Route::prefix('our-works')->name('our-works.')->group(function () {

    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\OurWorksController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\OurWorksController@updatePositions')->name('update-positions');

    Route::namespace('Relations\OurWorks')->group(function () {
        Route::prefix('our-works-images')->name('our-works-images.')->group(function () {
            Route::get('create', 'ImagesController@create')->name('create');
        });

        Route::prefix('services')->name('services.')->group(function () {
            Route::get('available', 'ServicesController@available')
                ->name('available');
            Route::get('rebuild-current', 'ServicesController@rebuildCurrent')
                ->name('rebuild-current');
        });

    });

});
Route::resource('our-works', 'EssenceControllers\OurWorksController')->except(['show']);


