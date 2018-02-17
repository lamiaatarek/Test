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
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});
Route::get('about/{id}', function ($id) {
    return 'lamiaa is'.$id ;
});
Route::get('/','mycontroller@index' );
Route::get('/services','mycontroller@services' );
Route::resource('posts','postsController' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('send','mailcontroller@send');

Route::get('/mid', 'mailcontroller@mid');
  Route::get('/midd', 'mailcontroller@midd');  
  Route::get('paginat','paginationcontroller@pag');

