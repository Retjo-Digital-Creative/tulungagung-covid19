<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Frontend\MainController@index')->name('frontend.home.landing');
Route::get('/getDataCovid', 'Frontend\MainController@getData')->name('frontend.getData.covid');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('news', 'Admin\NewsController@index');
});
