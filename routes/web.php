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

#prax start

// Route::get('/users/{userId}',function ($id){
//     return $id;
// });

// Route::get('/','PagesController@index');

// Route::get('/', function () {
//     return view('welcome');
// });

#prax end

Route::get('/','PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/service','PagesController@service');

Route::resource('blogs','BlogsController');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
