<?php

Route::prefix('structure')->name('structure.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\StructureController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\StructureController@updatePositions')->name('update-positions');
});


Route::resource('structure', 'EssenceControllers\StructureController')->except(['show']);

Route::namespace('PageControllers')->group(function () {
    Route::resource('home-pages', 'HomePageController')->only(['edit', 'update']);
    Route::resource('target-audience-pages', 'TargetAudiencePageController')->only(['edit', 'update']);
    Route::resource('service-pages', 'ServicePageController')->only(['edit', 'update']);
    Route::resource('competence-pages', 'CompetencePageController')->only(['edit', 'update']);
    Route::resource('review-pages', 'ReviewPageController')->only(['edit', 'update']);
    Route::resource('our-work-pages', 'OurWorkPageController')->only(['edit', 'update']);
    Route::resource('text-pages', 'TextPageController')->only(['edit', 'update']);
});
