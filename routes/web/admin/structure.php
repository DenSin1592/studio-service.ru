<?php

Route::prefix('structure')->name('structure.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'StructureController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'StructureController@updatePositions')->name('update-positions');
});


Route::resource('structure', 'StructureController')->except(['show']);

Route::namespace('PageControllers')->group(function () {
    Route::resource('home-pages', 'HomePageController')->only(['edit', 'update']);
    Route::resource('target-audience-pages', 'TargetAudiencePageController')->only(['edit', 'update']);
});
