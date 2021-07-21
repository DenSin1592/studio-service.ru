<?php

Route::prefix('services')->name('services.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'ServicesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'ServicesController@updatePositions')->name('update-positions');

    Route::prefix('competencies')->name('competencies.')->namespace('Relations\Services')->group(function () {
        Route::get('available', 'CompetenciesController@available')
            ->name('available');

        Route::get('rebuild-current', 'CompetenciesController@rebuildCurrent')
            ->name('rebuild-current');
    });
});
Route::resource('services', 'ServicesController')->except('show');
