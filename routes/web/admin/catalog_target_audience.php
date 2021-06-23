<?php

Route::prefix('target-audiences')->name('target-audiences.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'TargetAudiencesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'TargetAudiencesController@updatePositions')->name('update-positions');
});
Route::resource('target-audiences', 'TargetAudiencesController')->except('show');
