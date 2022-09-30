<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/service', 'Api\ApartmentController@services')->name('api.service.services');
Route::get('/search', 'Api\ApartmentController@getApartments')->name('api.getApartments.search');
Route::get('/distance/{radius}/{lat}/{lon}', 'Api\ApartmentController@radiusSearch')->name('api.radiusSearch.distance');
Route::get('/apartments/{apartment}', 'Api\ApartmentController@show')->name('api.apartments.show');
Route::get('/users', 'Api\ApartmentController@users')->name('api.users.users');
Route::post('/message', 'Api\MessageController@store')->name('api.message.store');
Route::get('/apartments', 'Api\ApartmentController@defaultApartments')->name('api.apartments.defaultApartments');
