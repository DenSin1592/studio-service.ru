<?php

Route::prefix('services')->name('services.')->group(function () {

    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\ServicesController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\ServicesController@updatePositions')->name('update-positions');

    Route::namespace('Relations\Services')->group(function () {
        Route::prefix('competencies')->name('competencies.')->group(function () {
            Route::get('available', 'CompetenciesController@available')
                ->name('available');

            Route::get('rebuild-current', 'CompetenciesController@rebuildCurrent')
                ->name('rebuild-current');
        });

        Route::prefix('tasks')->name('tasks.')->group(function () {
            Route::get('create', 'TasksController@create')->name('create');
        });

        Route::prefix('content-blocks')->name('content-blocks.')->group(function () {
            Route::get('create', 'ContentBlocksController@create')->name('create');
        });

        Route::prefix('tabs')->name('tabs.')->group(function () {
            Route::get('create', 'TabsController@create')->name('create');
        });

        Route::prefix('faq-questions')->name('faq-questions.')->group(function () {
            Route::get('create', 'FaqQuestionsController@create')->name('create');
        });

        Route::prefix('before-after-images')->name('before-after-images.')->group(function () {
            Route::get('available', 'BeforeAfterImagesController@available')
                ->name('available');

            Route::get('rebuild-current', 'BeforeAfterImagesController@rebuildCurrent')
                ->name('rebuild-current');
        });
    });
});
Route::resource('services', 'EssenceControllers\ServicesController')->except('show');
