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

// Custom authentifiction with based on Teacher model
Route::prefix('teacher')->group(function() { 
	Route::get('/','TeacherController@index')->name('teacher');
    Route::get('/login','Auth\TeacherLoginController@showLoginForm')->name('teacher.login');
    Route::post('/login','Auth\TeacherLoginController@login')->name('teacher.login.submit');
    Route::get('/logout','Auth\TeacherLoginController@logout')->name('teacher.logout');
});

Route::resource('student', 'StudentController');

