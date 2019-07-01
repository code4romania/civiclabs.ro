<?php

// Register Twill routes here (eg. Route::module('posts'))

Route::module('posts');

Route::prefix('solutions')->group(function () {
    Route::module('solutions');
    Route::module('byproducts');
    Route::module('domains');
});

Route::prefix('applications')->group(function () {
    Route::module('applicationForms');
    Route::module('applicationSubmissions');
    Route::module('applicationEvaluations');
    Route::module('dashboardUsers');
});

Route::module('pages');
Route::module('partners');
Route::module('people');
