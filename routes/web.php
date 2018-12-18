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
	$lastUser = DB::select('select max(id) as last_id from users');
	return dump($lastUser[0]->last_id+1);
});

Route::get('/test-assets', function () {
	return view('students.index');
});

// Default route for authentifiction based on User model
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	// Routes for students model
	Route::get('/', 'StudentController@index');
	Route::resource('student', 'StudentController');
	Route::post('student/searche', 'StudentController@searche')->name('student.searche');

	// Routes for module model
	Route::resource('module', 'ModuleController');

	// Routes for absence model
	Route::resource('absence', 'AbsenceController');
	Route::post('absence/searche', 'AbsenceController@searche')->name('absence.searche');
	
	// Routes for teacher model
	Route::resource('teacher', 'TeacherController');
	Route::post('teacher/searche', 'TeacherController@searche')->name('teacher.searche');
});

