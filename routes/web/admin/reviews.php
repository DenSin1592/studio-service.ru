<?php

Route::prefix('reviews')->name('reviews.')->group(function () {

    Route::put('toggle/{id}/{attribute}', 'ReviewsController@toggleAttribute')->name('toggle-attribute');

    Route::namespace('Relations\Reviews')->group(function () {
        Route::prefix('review-images')->name('review-images.')->group(function () {
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
Route::resource('reviews', 'ReviewsController')->except(['show']);


