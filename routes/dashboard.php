<?php

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'namespace'  => 'Dashboard',
    'domain'     => config('dashboard.url'),
    'prefix'     => rtrim(ltrim(config('dashboard.path'), '/'), '/'),
], function () {
    Auth::routes([
        'register' => false,
    ]);

    Route::get('/', 'DashboardController@index')->name('dashboard.home');
    Route::get('/document/{uuid}/{filename}', 'DashboardController@download')->name('dashboard.download');
    Route::get('/solution/{solution}', 'DashboardController@solution')->name('dashboard.solution');

    Route::get('/submission/{submission}', 'DashboardController@submission')->name('dashboard.submission');
    Route::post('/submission/{submission}/evaluate', 'DashboardController@evaluate')->name('dashboard.evaluate');
});
