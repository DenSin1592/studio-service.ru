<?php

Route::prefix('competencies')->name('competencies.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\CompetenciesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\CompetenciesController@updatePositions')->name('update-positions');
});
Route::resource('competencies', 'EssenceControllers\CompetenciesController')->except('show');
