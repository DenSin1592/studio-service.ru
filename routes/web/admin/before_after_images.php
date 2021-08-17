<?php

Route::prefix('before-after-images')->name('before-after-images.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\BeforeAfterImagesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\CompetenciesController@updatePositions')->name('update-positions');
});
Route::resource('before-after-images', 'EssenceControllers\BeforeAfterImagesController')->except('show');
