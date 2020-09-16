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
    return redirect('/login');
});

Auth::routes();

Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');
});

// //////////////////////////////////////////////////////////////////////////////////
//job_category
Route::group(['prefix' => 'job_category', 'middleware' => ['auth']], function () {
    Route::get('/', 'JobCategoryController@index');
    Route::get('/create', 'JobCategoryController@create');
    Route::post('/', 'JobCategoryController@store');
    Route::get('/{id}/edit', 'JobCategoryController@edit');
    Route::post('/{id}/update', 'JobCategoryController@update');
    Route::post('/{id}/delete', 'JobCategoryController@delete');
});
