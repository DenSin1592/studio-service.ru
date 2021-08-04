<?php

Route::resource('feedback', 'EssenceControllers\FeedbackController')->except('show');
