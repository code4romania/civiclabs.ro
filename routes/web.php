<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'namespace'  => 'Front',
    'domain'     => config('app.url'),
    'prefix'     => Localization::setLocale(),
    'middleware' => 'localize',
], function () {
    Route::get('domains', 'DomainController@index')->name('domains.index');
    Route::get('domains/{domain}', 'DomainController@show')->name('domains.show');

    Route::get('solutions', 'SolutionController@index')->name('solutions.index');
    Route::get('solutions/{solution}', 'SolutionController@show')->name('solutions.show');
    Route::get('solutions/{solution}/apply', 'SolutionController@apply')->name('solutions.apply');
    Route::post('solutions/{solution}/apply', 'SolutionController@submit')->name('solutions.submit');

    Route::get('byproducts/{byproduct}', 'ByproductController@show')->name('byproducts.show');

    Route::get('team/{member}', 'PersonController@show')->name('team.show');

    Route::get('blog', 'PostController@index')->name('blog.index');
    Route::get('blog/{slug}', 'PostController@show')->name('blog.show');

    Route::post('/newsletter', 'NewsletterController@subscribe')->name('newsletter.subscribe');
    Route::get('/newsletter', 'NewsletterController@thanks')->name('newsletter.thanks');

    Route::get('/', 'PageController@index')->name('pages.index');
    Route::get('{page}', 'PageController@show')->name('pages.show');
});

Route::get('/img/{path}', 'GlideController@show')->where('path', '.*');
Route::post('/cookieConsent', 'SessionController@cookieConsent')->name('session.cookieConsent');
Route::post('/checkboxConsent/{identifier}', 'SessionController@checkboxConsent')->name('session.checkboxConsent');
