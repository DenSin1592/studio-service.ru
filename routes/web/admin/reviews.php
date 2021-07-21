<?php

Route::prefix('reviews')->name('reviews.')->group(function () {

    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\ReviewsController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\ReviewsController@updatePositions')->name('update-positions');

    Route::namespace('Relations\Reviews')->group(function () {
        Route::prefix('reviews-images')->name('reviews-images.')->group(function () {
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
Route::resource('reviews', 'EssenceControllers\ReviewsController')->except(['show']);


