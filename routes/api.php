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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/slider', 'Api\SliderController@Slider');
Route::get('/settings', 'Api\SliderController@Settings');
Route::get('/posts', 'Api\SliderController@Posts');
Route::get('/post/{id}', 'Api\SliderController@Post');
Route::get('/lab-equipments', 'Api\SliderController@Blogs');
Route::get('/lab-equipment/{id}', 'Api\SliderController@Blog');
Route::get('/partners', 'Api\SliderController@partners');
Route::get('/aboutUs', 'Api\SliderController@aboutUs');

Route::post('/ContactUs', 'Api\SliderController@ContactUs');
Route::post('/sample', 'Api\SliderController@sample');

Route::post('/ClientLogin', 'Api\SliderController@ClientLogin');
Route::post('/ClientAnalyses', 'Api\SliderController@ClientAnalyses');


Route::post('/DoctorLogin', 'Api\SliderController@DoctorLogin');
Route::post('/DoctorClientAnalyses', 'Api\SliderController@DoctorClientAnalyses');


Route::get('/test_get', 'Admin\PartnerController@test_get');

Route::post('/test_post', 'Admin\PartnerController@test_post');
