<?php

use Illuminate\Support\Facades\Route;

    Route::get('admin', 'HomeController@index')->name('admin.blank');



    Auth::routes();

    Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('admin/logout', 'Auth\AdminLoginController@logout')->name('logout');

    // Admin routes
    Route::group(['prefix' => 'admin','namespace' => 'Admin','middleware' => 'auth:admin'], function () {

        Route::get('/', 'HomeController@index')->name('admin.blank');

        Route::get('/admins', 'AdminController@index');
        Route::get('/show_admin/{id}', 'AdminController@show');
        Route::get('/create_admin', 'AdminController@create');
        Route::post('/create_admin', 'AdminController@store')->name('admin.create_admin.submit');
        Route::get('/edit_admin/{id}', 'AdminController@edit');
        Route::post('/edit_admin', 'AdminController@update')->name('admin.edit_admin.submit');
        Route::post('/delete_admin', 'AdminController@delete')->name('admin.delete_admin');

        Route::get('/roles', 'RoleController@index');
        Route::get('/show_role/{id}', 'RoleController@show');
        Route::get('/create_role', 'RoleController@create');
        Route::post('/create_role', 'RoleController@store')->name('admin.create_role.submit');
        Route::get('/edit_role/{id}', 'RoleController@edit');
        Route::post('/edit_role', 'RoleController@update')->name('admin.edit_role.submit');
        Route::post('/delete_role', 'RoleController@delete')->name('admin.delete_role');

        Route::get('/sliders', 'SliderController@index');
        Route::get('/show_slider/{id}', 'SliderController@show');
        Route::get('/create_slider', 'SliderController@create');
        Route::post('/create_slider', 'SliderController@store')->name('admin.create_slider.submit');
        Route::get('/edit_slider/{id}', 'SliderController@edit');
        Route::post('/edit_slider', 'SliderController@update')->name('admin.edit_slider.submit');
        Route::post('/delete_slider', 'SliderController@delete')->name('admin.delete_slider');

        Route::get('/contacts', 'ContactController@index');
        Route::get('/show_contact/{id}', 'ContactController@show');
        Route::get('/create_contact', 'ContactController@create');
        Route::post('/create_contact', 'ContactController@store')->name('admin.create_contact.submit');
        Route::get('/edit_contact/{id}', 'ContactController@edit');
        Route::post('/edit_contact', 'ContactController@update')->name('admin.edit_contact.submit');
        Route::post('/delete_contact', 'ContactController@delete')->name('admin.delete_contact');

        Route::get('/inquires', 'InquiryController@index');
        Route::get('/show_inquiry/{id}', 'InquiryController@show');
        Route::get('/create_inquiry', 'InquiryController@create');
        Route::post('/create_inquiry', 'InquiryController@store')->name('admin.create_inquiry.submit');
        Route::get('/edit_inquiry/{id}', 'InquiryController@edit');
        Route::post('/edit_inquiry', 'InquiryController@update')->name('admin.edit_inquiry.submit');
        Route::post('/delete_inquiry', 'InquiryController@delete')->name('admin.delete_inquiry');

        Route::get('/pages', 'PageController@index');
        Route::get('/show_page/{id}', 'PageController@show');
        Route::get('/create_page', 'PageController@create');
        Route::post('/create_page', 'PageController@store')->name('admin.create_page.submit');
        Route::get('/edit_page/{id}', 'PageController@edit');
        Route::post('/edit_page', 'PageController@update')->name('admin.edit_page.submit');
        Route::post('/delete_page', 'PageController@delete')->name('admin.delete_page');



        Route::get('/posts', 'PostController@index');
        Route::get('/show_post/{id}', 'PostController@show');
        Route::get('/create_post', 'PostController@create');
        Route::post('/create_post', 'PostController@store')->name('admin.create_post.submit');
        Route::get('/edit_post/{id}', 'PostController@edit');
        Route::post('/edit_post', 'PostController@update')->name('admin.edit_post.submit');
        Route::post('/delete_post', 'PostController@delete')->name('admin.delete_post');




        Route::get('/services', 'ServiceController@index');
        Route::get('/show_service/{id}', 'ServiceController@show');
        Route::get('/create_service', 'ServiceController@create');
        Route::post('/create_service', 'ServiceController@store')->name('admin.create_service.submit');
        Route::get('/edit_service/{id}', 'ServiceController@edit');
        Route::post('/edit_service', 'ServiceController@update')->name('admin.edit_service.submit');
        Route::post('/delete_service', 'ServiceController@delete')->name('admin.delete_service');

        Route::get('/blogs', 'BlogController@index');
        Route::get('/show_blog/{id}', 'BlogController@show');
        Route::get('/create_blog', 'BlogController@create');
        Route::post('/create_blog', 'BlogController@store')->name('admin.create_blog.submit');
        Route::get('/edit_blog/{id}', 'BlogController@edit');
        Route::post('/edit_blog', 'BlogController@update')->name('admin.edit_blog.submit');
        Route::post('/delete_blog', 'BlogController@delete')->name('admin.delete_blog');

        Route::get('/documentarys', 'DocumentaryController@index');
        Route::get('/show_documentary/{id}', 'DocumentaryController@show');
        Route::get('/create_documentary', 'DocumentaryController@create');
        Route::post('/create_documentary', 'DocumentaryController@store')->name('admin.create_documentary.submit');
        Route::get('/edit_documentary/{id}', 'DocumentaryController@edit');
        Route::post('/edit_documentary', 'DocumentaryController@update')->name('admin.edit_documentary.submit');
        Route::post('/delete_documentary', 'DocumentaryController@delete')->name('admin.delete_documentary');

        Route::get('/settings', 'SettingController@index');
        Route::get('/create_setting', 'SettingController@create');
        Route::post('/add_setting', 'SettingController@store')->name('admin.add_setting.submit');
        Route::get('/edit_setting/{id}', 'SettingController@edit');
        Route::post('/edit_setting', 'SettingController@update')->name('admin.edit_setting.submit');
        Route::post('/delete-setting', 'SettingController@delete')->name('admin.delete_setting');

        Route::get('/category', 'CategoryController@index')->middleware(['can:categories']);
        Route::post('/create_category', 'CategoryController@store')->name('admin.create_category.submit');
        Route::get('/edit_category', 'CategoryController@edit')->middleware(['can:edit_categoires']);;
        Route::post('/update_category', 'CategoryController@update')->name('admin.update_category.submit');
        Route::post('/delete_category', 'CategoryController@delete')->name('admin.delete_category');

        Route::get('/partners', 'PartnerController@index');
        Route::post('/create_partner', 'PartnerController@store')->name('admin.create_partner.submit');
        Route::get('/edit_partner', 'PartnerController@edit');
        Route::post('/update_partner', 'PartnerController@update')->name('admin.update_partner.submit');
        Route::post('/delete_partner', 'PartnerController@delete')->name('admin.delete_partner');

        Route::get('/languages', 'LangController@index');
        Route::post('/create_language', 'LangController@store')->name('admin.create_language.submit');
        Route::get('/edit_language', 'LangController@edit');
        Route::post('/update_language', 'LangController@update')->name('admin.update_language.submit');
        Route::post('/delete_language', 'LangController@delete')->name('admin.delete_language');


        Route::get('/subscribers', 'SubscriberController@index');
        Route::get('/show_subscriber/{id}', 'SubscriberController@show');
        Route::get('/create_subscriber', 'SubscriberController@create');
        Route::post('/create_subscriber', 'SubscriberController@store')->name('admin.create_subscriber.submit');
        Route::get('/edit_subscriber/{id}', 'SubscriberController@edit');
        Route::post('/edit_subscriber', 'SubscriberController@update')->name('admin.edit_subscriber.submit');
        Route::post('/delete_subscriber', 'SubscriberController@delete')->name('admin.delete_subscriber');
        Route::get('/export_excel', 'SubscriberController@exportIntoExcel')->name('admin.export');
        Route::post('/filter_subscriber', 'SubscriberController@filter')->name('admin.filter_subscriber.submit');
        Route::get('/filter_subscriber', 'SubscriberController@index');
        Route::get('/import_products', 'SubscriberController@import_products');
        Route::post('/import_products', 'SubscriberController@import_products_store')->name('admin.import_products.submit');

        Route::post('/create_family', 'SubscriberController@storeFamily')->name('admin.create_family.submit');
        Route::get('/edit_family', 'SubscriberController@EditFamily');
        Route::get('/delete_family', 'SubscriberController@deletefamily')->name('admin.delete_family');
        Route::post('/edit_family', 'SubscriberController@updatefamily')->name('admin.edit_family.submit');


        Route::post('/create_analysis', 'SubscriberController@storeanalysis')->name('admin.create_analysis.submit');
        Route::get('/delete_analysis', 'SubscriberController@deleteanalysis')->name('admin.delete_analysis');


        Route::post('/create_notes', 'NotesController@store')->name('admin.create_notes.submit');
        Route::get('/notes', 'NotesController@index');

        Route::post('/create_assistant', 'AssistantController@store')->name('admin.create_assistant.submit');
        Route::get('/edit_assistant', 'AssistantController@edit');
        Route::post('/edit_assistant', 'AssistantController@update')->name('admin.edit_assistant.submit');
        Route::get('/delete_assistant', 'AssistantController@destroy')->name('admin.delete_assistant');


        Route::get('/samples', 'SampleController@index');
        Route::get('/show_samples/{id}', 'SampleController@show');
         Route::post('/delete_samples', 'SampleController@delete')->name('admin.delete_samples');


    });

