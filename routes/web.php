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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', 'Admin\DashboardController')->name('admin.home');
	Route::get('/data', 'Admin\DataCovid@index')->name('admin.data.index');
	Route::get('/berita', 'Admin\NewsController@adminIndex')->name('admin.berita.index');
	Route::get('/berita/tambah', 'Admin\NewsController@create')->name('admin.berita.tambah');
	Route::post('/berita/check-slug', 'Admin\NewsController@checkSlug')->name('admin.berita.checkSlug');
	Route::post('/berita/store', 'Admin\NewsController@store')->name('admin.berita.store');
	Route::get('/berita/edit/{id}', 'Admin\NewsController@edit')->name('admin.berita.edit');
	Route::put('/berita/update/{id}', 'Admin\NewsController@update')->name('admin.berita.update');
	Route::delete('/berita/delete/{id}', 'Admin\NewsController@destroy')->name('admin.berita.delete');
});
Route::delete('/data/delete/{id}', 'Admin\DataCovid@deleteData')->name('admin.data.delete');
Route::post('/data/store', 'Admin\DataCovid@newData')->name('admin.data.store');
Route::get('/data/fetch/{id}', 'Admin\DataCovid@getData')->name('admin.data.get');
Route::put('/data/update/{id}', 'Admin\DataCovid@updateData')->name('admin.data.update');

Route::group(['prefix' => 'berita'], function() {
	Route::get('/', 'Admin\NewsController@index')->name('frontend.berita.index');
	Route::get('/baca/{berita}', 'Admin\NewsController@show')->name('frontend.berita.show');
});