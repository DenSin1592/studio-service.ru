<?php

Route::prefix('competencies')->name('competencies.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'CompetenciesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'CompetenciesController@updatePositions')->name('update-positions');
});
Route::resource('competencies', 'CompetenciesController')->except('show');
