<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::group(['namespace' => 'Front'], function () {

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/contact-us', 'HomeController@ContactUs');
    Route::get('/about-us', 'HomeController@about');
    Route::get('/products', 'HomeController@Gallery');


    Route::get('/all-service', 'HomeController@AllService');
    Route::get('/service/{id}', 'HomeController@Service');
    Route::get('/product/{id}', 'HomeController@LabEquipment');


});

Route::group(['namespace' => 'Front'], function () {
    Route::post('/contact', 'HomeController@contact_Us');


});


Route::get('lang/{lang}', function ($lang) {

    if (session()->has('lang')) {
        session()->forget('lang');
    }
    if ($lang == 'ar') {
        session()->put('lang', 'ar');
    } else {
        session()->put('lang', 'en');
    }


    return back();
});
