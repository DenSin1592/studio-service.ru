<?php

Route::prefix('reviews')->name('reviews.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'ReviewsController@toggleAttribute')->name('toggle-attribute');

    Route::prefix('review-images')->name('review-images.')->namespace('Reviews')->group(function () {
        Route::get('create', 'ImagesController@create')->name('create');
    });
});
Route::resource('reviews', 'ReviewsController')->except(['show']);


