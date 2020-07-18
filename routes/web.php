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

// Route::get('/dashboard', 'JobApplicationController@dashboard')->name('dashboard');
Route::get('/dashboard', 'JobController@index')->name('dashboard');


// //User 
// Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
//     Route::get('/', 'UserController@index');
//     Route::get('create', 'UserController@create');
//     Route::post('/', 'UserController@store');
//     Route::get('{id}/edit', 'UserController@edit');
//     Route::post('{id}/update', 'UserController@update');
//     Route::post('{id}/delete', 'UserController@delete');
// });

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');

});

//Project 
Route::group(['prefix' => 'projects', 'middleware' => ['auth']], function () {
    Route::get('/', 'ProjectController@index');
    Route::get('create', 'ProjectController@create');
    Route::post('/', 'ProjectController@store');
    Route::get('{id}/edit', 'ProjectController@edit');
    Route::post('{id}/update', 'ProjectController@update');
    Route::post('{id}/delete', 'ProjectController@delete');
});

//Project Type
Route::group(['prefix' => 'project_types', 'middleware' => ['auth']], function () {
    Route::get('/', 'ProjectTypeController@index');
    Route::get('create', 'ProjectTypeController@create');
    Route::post('/', 'ProjectTypeController@store')->name('store_project_types');
    Route::get('{id}/edit', 'ProjectTypeController@edit');
    Route::post('{id}/update', 'ProjectTypeController@update');
    Route::post('{id}/delete', 'ProjectTypeController@delete');
});

//Technologies
Route::group(['prefix' => 'technologies', 'middleware' => ['auth']], function () {
    Route::get('/', 'TechnologiesController@index');
    Route::get('create', 'TechnologiesController@create');
    Route::post('/', 'TechnologiesController@store');
    Route::get('{id}/edit', 'TechnologiesController@edit');
    Route::post('{id}/update', 'TechnologiesController@update');
    Route::post('{id}/delete', 'TechnologiesController@delete');
});

//Database
Route::group(['prefix' => 'databases', 'middleware' => ['auth']], function () {
    Route::get('/', 'DatabaseController@index');
    Route::get('create', 'DatabaseController@create');
    Route::post('/', 'DatabaseController@store');
    Route::get('{id}/edit', 'DatabaseController@edit');
    Route::post('{id}/update', 'DatabaseController@update');
    Route::post('{id}/delete', 'DatabaseController@delete');
});


//Server
Route::group(['prefix' => 'servers', 'middleware' => ['auth']], function () {
    Route::get('/', 'ServerController@index');
    Route::get('create', 'ServerController@create');
    Route::post('/', 'ServerController@store');
    Route::get('{id}/edit', 'ServerController@edit');
    Route::post('{id}/update', 'ServerController@update');
    Route::post('{id}/delete', 'ServerController@delete');
});

//Fields
Route::group(['prefix' => 'fields', 'middleware' => ['auth']], function () {
    Route::get('/{id}', 'FieldsController@index');
    Route::get('create/{id}', 'FieldsController@create');
    Route::post('/', 'FieldsController@store');
    Route::get('{id}/edit', 'FieldsController@edit');
    Route::post('{id}/update', 'FieldsController@update');
    Route::post('{id}/delete', 'FieldsController@delete');
});

//Pages
Route::group(['prefix' => 'pages', 'middleware' => ['auth']], function () {
    Route::get('/{id}', 'PagesController@index');
    Route::get('create/{id}', 'PagesController@create');
    Route::post('/', 'PagesController@store');
    Route::get('{id}/edit', 'PagesController@edit');
    Route::post('{id}/update', 'PagesController@update');
    Route::post('{id}/delete', 'PagesController@delete');
    Route::post('/get_fields', 'PagesController@getFileds');

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

//job_type
Route::group(['prefix' => 'job_type', 'middleware' => ['auth']], function () {
    Route::get('/', 'JobTypeController@index');
    Route::get('/create', 'JobTypeController@create');
    Route::post('/', 'JobTypeController@store');
    Route::get('/{id}/edit', 'JobTypeController@edit');
    Route::post('/{id}/update', 'JobTypeController@update');
    Route::post('/{id}/delete', 'JobTypeController@delete');
});

//refered from
Route::group(['prefix' => 'refered_from', 'middleware' => ['auth']], function () {
    Route::get('/', 'ReferedFromController@index');
    Route::get('/create', 'ReferedFromController@create');
    Route::post('/', 'ReferedFromController@store');
    Route::get('/{id}/edit', 'ReferedFromController@edit');
    Route::post('/{id}/update', 'ReferedFromController@update');
    Route::post('/{id}/delete', 'ReferedFromController@delete');
});

//country
Route::group(['prefix' => 'country', 'middleware' => ['auth']], function () {
    Route::get('/', 'CountryController@index');
    Route::get('/create', 'CountryController@create');
    Route::post('/', 'CountryController@store');
    Route::get('/{id}/edit', 'CountryController@edit');
    Route::post('/{id}/update', 'CountryController@update');
    Route::post('/{id}/delete', 'CountryController@delete');
});

//State
Route::group(['prefix' => 'state', 'middleware' => ['auth']], function () {
    Route::get('/', 'StateController@index');
    Route::get('/create', 'StateController@create');
    Route::post('/', 'StateController@store');
    Route::get('/{id}/edit', 'StateController@edit');
    Route::post('/{id}/update', 'StateController@update');
    Route::post('/{id}/delete', 'StateController@delete');
    Route::post('/get_state_list', 'StateController@getStates');
});

//City
Route::group(['prefix' => 'city', 'middleware' => ['auth']], function () {
    Route::get('/', 'CityController@index');
    Route::get('/create', 'CityController@create');
    Route::post('/', 'CityController@store');
    Route::get('/{id}/edit', 'CityController@edit');
    Route::post('/{id}/update', 'CityController@update');
    Route::post('/{id}/delete', 'CityController@delete');
    Route::post('/get_city_list', 'CityController@getCity');
    
    
});

//Job
Route::group(['prefix' => 'job', 'middleware' => ['auth']], function () {
    Route::get('/', 'JobController@index');
    Route::get('/create', 'JobController@create');
    Route::post('/', 'JobController@store');
    Route::get('/{id}/edit', 'JobController@edit');
    Route::post('/{id}/update', 'JobController@update');
    Route::post('/{id}/delete', 'JobController@delete');
});

//currency
Route::group(['prefix' => 'currency', 'middleware' => ['auth']], function () {
    Route::get('/', 'CurrencyController@index');
    Route::get('/create', 'CurrencyController@create');
    Route::post('/', 'CurrencyController@store');
    Route::get('/{id}/edit', 'CurrencyController@edit');
    Route::post('/{id}/update', 'CurrencyController@update');
    Route::post('/{id}/delete', 'CurrencyController@delete');
});

//salary_period
Route::group(['prefix' => 'salary_period', 'middleware' => ['auth']], function () {
    Route::get('/', 'SalaryPeriodController@index');
    Route::get('/create', 'SalaryPeriodController@create');
    Route::post('/', 'SalaryPeriodController@store');
    Route::get('/{id}/edit', 'SalaryPeriodController@edit');
    Route::post('/{id}/update', 'SalaryPeriodController@update');
    Route::post('/{id}/delete', 'SalaryPeriodController@delete');
});


//hiring_organization
Route::group(['prefix' => 'hiring_organization', 'middleware' => ['auth']], function () {
    Route::get('/', 'HiringOrganizationController@index');
    Route::get('/create', 'HiringOrganizationController@create');
    Route::post('/', 'HiringOrganizationController@store');
    Route::get('/{id}/edit', 'HiringOrganizationController@edit');
    Route::post('/{id}/update', 'HiringOrganizationController@update');
    Route::post('/{id}/delete', 'HiringOrganizationController@delete');
});