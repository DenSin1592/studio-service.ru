<?php

Route::prefix('services')->name('services.')->group(function () {

    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\ServicesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\ServicesController@updatePositions')->name('update-positions');

    Route::prefix('competencies')->name('competencies.')->namespace('Relations\Services')->group(function () {
        Route::get('available', 'CompetenciesController@available')
            ->name('available');

        Route::get('rebuild-current', 'CompetenciesController@rebuildCurrent')
            ->name('rebuild-current');
    });

    Route::prefix('tasks')->name('tasks.')->namespace('Relations\Services')->group(function () {
        Route::get('create', 'TasksController@create')->name('create');
    });

});
Route::resource('services', 'EssenceControllers\ServicesController')->except('show');
