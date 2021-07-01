<?php

Route::prefix('services')->name('services.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'ServicesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'ServicesController@updatePositions')->name('update-positions');
});
Route::resource('services', 'ServicesController')->except('show');
