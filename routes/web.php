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

// Routes for tests ;)
Route::get('/bcrypt/{password}', function ($password) {
	return bcrypt($password);
});

Route::get('/all-sessions', function () {
	return dump(Session::all());
});

Route::get('/test-assets', function () {
	return view('students.index');
});

// Default route for authentifiction based on User model
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	// Routes for students model
	Route::get('/', 'StudentController@index');
	Route::post('student/searche', 'StudentController@searche')->name('student.searche');
	Route::resource('student', 'StudentController');

	Route::resource('module', 'ModuleController');
});

