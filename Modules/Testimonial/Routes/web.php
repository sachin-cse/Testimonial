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

Route::prefix('testimonial')->group(function() {
    Route::get('/', 'TestimonialController@index')->name('user.testimonial');
});


Route::prefix('testimonial')->group(function() {
    Route::get('/login', 'TestimonialController@login')->name('testimonial.signin');
    Route::post('/user/login', 'TestimonialController@userlogin')->name('testimonial.userlogin');
    
});

Route::prefix('testimonial')->group(function() {
    Route::get('/signup', 'TestimonialController@signup')->name('testimonial.signup');
    Route::post('/user/signup', 'TestimonialController@usersignup')->name('testimonial.usersignup');
});