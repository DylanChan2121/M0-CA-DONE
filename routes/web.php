<?php
# @Date:   2019-11-08T17:38:21+00:00
# @Last modified time: 2019-11-19T13:11:50+00:00




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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctor.home');
Route::get('/patient/home', 'Patient\HomeController@index')->name('patient.home');
//use
//Route::get('/patient/home{id}', 'Patient\HomeController@index')->name('patient.home'); semi fix
