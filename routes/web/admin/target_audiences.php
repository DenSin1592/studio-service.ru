<?php

Route::prefix('target-audiences')->name('target-audiences.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\TargetAudiencesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\TargetAudiencesController@updatePositions')->name('update-positions');
});
Route::resource('target-audiences', 'EssenceControllers\TargetAudiencesController')->except('show');
