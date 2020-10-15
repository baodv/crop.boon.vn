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

Route::group(['namespace' => 'FrontEnd'], function () {
	Route::get('/', 'HomeController@index')->name('home.index');

	Route::post('upload-image', 'UploadImageController@store')->name('image.upload');
	Route::get('crop-image', 'UploadImageController@cropImage')->name('image.crop');

	Route::post('change-frame','UploadImageController@changeFrame')->name('image.change.frame');
	Route::post('reset-image','UploadImageController@resetImage')->name('image.reset');
	Route::post('delete-image','UploadImageController@deleteImage')->name('image.delete');
});
