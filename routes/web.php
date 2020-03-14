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

Route::get('/', function () {
    return view('landing.home');
});

Route::get('/testsignin', function() {
   return view('landing.signin');
});

Route::get('/testsignup', function() {
   return view('landing.signup'); 
});
