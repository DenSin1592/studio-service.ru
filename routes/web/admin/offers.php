<?php

Route::prefix('offers')->name('offers.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\OffersController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\OffersController@updatePositions')->name('update-positions');
});
Route::resource('offers', 'EssenceControllers\OffersController')->except('show');
