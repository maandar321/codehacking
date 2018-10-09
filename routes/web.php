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

//Route::get('/', function () {
//    return view('welcome');
//});
//
Auth::routes();
//
Route::get('/home', 'HomeController@index')->name('home');
//
//
//
//
//
//route::group(['middleware'=>'admin:18'],function (){
//
//
//    Route::resource('admin/users','AdminUserController');
//
//    Route::resource('admin/posts','AdminPostController');
//
//    Route::resource('admin/categories','AdminCategoryController');
//
//
//});
//Route::get('/admin','HomeController@dashboard');
//
//route::get('admin/users/create','AdminUserController@create');
//
//
//route::view('/welcome','welcome');
//
//
//Route::get('user/profile', function () {
//    return view('welcome');
//})->name('profile');



//inserting data through excel sheet

Route::get('/', 'StudentController@index')->name('index');
Route::post('import', 'StudentController@import')->name('import');





