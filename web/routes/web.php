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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale()
    ],function()
    {
    
    
    
    
    

        Route::group(['prefix' => 'twadm', 'middleware' => 'auth'], function () {
            Route::get('/', 'BackendController@index');

            /*
             * First Level Admin Modules
            **/

            Route::resource('users',    'UsersController');
            Route::resource('menus',    'MenusController');
            Route::resource('pages',    'PagesController');
            Route::resource('partners', 'PartnersController');
            Route::resource('settings', 'SettingsController');

            /** ******* Translation ******* **/
            Route::get('translations', 'TranslationsController@index');
            Route::post('translations/import', 'TranslationsController@importTranslations');
            Route::post('translations/export', 'TranslationsController@exportTranslations');
            Route::post('translations/postAdd', 'TranslationsController@postAdd');
            Route::post('translations/save', 'TranslationsController@save');
            Route::post('translations/getView', 'TranslationsController@getView');
            Route::get('translations/getView', 'TranslationsController@getView');
            Route::get('translations/getIndex', 'TranslationsController@getIndex');
            Route::post('translations/postEdit', 'TranslationsController@postEdit');
            Route::post('translations/postDelete', 'TranslationsController@postDelete');

        });

        // Authentication routes...
        Route::get('twadm/login', '\App\Http\Controllers\Auth\LoginController@showLoginForm');
        Route::post('twadm/login', '\App\Http\Controllers\Auth\LoginController@login');
        Route::get('twadm/logout', '\App\Http\Controllers\Auth\LoginController@logout');

        Route::get('/', 'FrontendController@index');

    });