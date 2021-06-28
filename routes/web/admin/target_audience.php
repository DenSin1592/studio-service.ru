<?php

Route::prefix('target-audience')->name('target-audience.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'TargetAudiencesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'TargetAudiencesController@updatePositions')->name('update-positions');
});
Route::resource('target-audience', 'TargetAudiencesController')->except('show');
