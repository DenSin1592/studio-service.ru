<?php

Route::prefix('offers')->name('offers.')->group(function () {
    Route::put('toggle/{id}/{attribute}', 'EssenceControllers\OffersController@toggleAttribute')->name('toggle-attribute');
    Route::put('update-positions', 'EssenceControllers\OffersController@updatePositions')->name('update-positions');

    Route::namespace('Relations\Offers')->group(function () {

        Route::prefix('competencies')->name('competencies.')->group(function () {
            Route::get('available', 'CompetenciesController@available')
                ->name('available');

            Route::get('rebuild-current', 'CompetenciesController@rebuildCurrent')
                ->name('rebuild-current');
        });
        Route::prefix('services')->name('services.')->group(function () {
            Route::get('search', 'ServicesController@getSearchedValues')->name('search');
        });
        Route::prefix('target-audiences')->name('target-audiences.')->group(function () {
            Route::get('search', 'TargetAudiencesController@getSearchedValues')->name('search');
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

        Route::prefix('reviews')->name('reviews.')->group(function () {
            Route::get('available', 'ReviewsController@available')
                ->name('available');

            Route::get('rebuild-current', 'ReviewsController@rebuildCurrent')
                ->name('rebuild-current');
        });

        Route::prefix('our-works')->name('our-works.')->group(function () {
            Route::get('available', 'ProjectsController@available')
                ->name('available');

            Route::get('rebuild-current', 'ProjectsController@rebuildCurrent')
                ->name('rebuild-current');
        });

    });

});
Route::resource('offers', 'EssenceControllers\OffersController')->except('show');


