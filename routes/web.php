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
    Route::get('/documentary', 'HomeController@documentary');

    Route::get('/all-service', 'HomeController@AllService');
    Route::get('/service/{id}', 'HomeController@Service');
    Route::get('/product/{id}', 'HomeController@LabEquipment');
    Route::get('/home-sample-collection-request', function () {
        return view('front.pages.pullrequest');
    });
    Route::get('/doctor-login', function () {
        return view('old_front.pages.doctor_login');
    });
    Route::get('/Doctor-Analysis', 'DoctorController@DoctorClientAnalyses')->middleware("auth:doctors");
    Route::get('/client-login', function () {
        return view('front.pages.client_login');
    });
    Route::get('/Client-Analysis', 'DoctorController@ClientAnalyses');

    Route::get('/client-logout', function () {
        if (Auth::guard('subscribers')->check()) {
            Auth::guard('subscribers')->logout();
        }
        return redirect(url('/'));
    });

    Route::get('/doctor-logout', function () {
        if (Auth::guard('doctors')->check()) {
            Auth::guard('doctors')->logout();
        }
        return redirect(url('/'));
    });

});

Route::group(['namespace' => 'Front'], function () {
    Route::post('/contact', 'HomeController@contact_Us');
    Route::post('/pull-request', 'HomeController@PullRequest');
    Route::post('/doctor-login', 'DoctorController@DoctorLogin');
    Route::post('/client-login', 'DoctorController@ClientLogin');

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
