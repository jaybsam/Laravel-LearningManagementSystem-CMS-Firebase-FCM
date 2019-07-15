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


Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/introduction', function(){
	return view('introduction');
});

Route::match(['get', 'post'], '/register', function () {
    return view('register');
});
Route::match(['get', 'post'], '/resource', function () {
    return view('resource');
});
Route::match(['get', 'post'], '/research&academics', function () {
    return view('research');
});
Route::match(['get', 'post'], '/about/mission', function () {
    return view('mission');
});
Route::match(['get', 'post'], '/about/vision', function () {
    return view('vision');
});
Route::match(['get', 'post'], '/about/corevalues', function () {
    return view('corevalues');
});
Route::match(['get', 'post'], '/about/location', function () {
    return view('location');
});
Route::match(['get', 'post'], '/about/campuslife', function () {
    return view('campuslife');
});
Route::match(['get', 'post'], '/about', function () {
    return view('about');
});
Route::match(['get', 'post'], '/administration', function () {
    return view('administration');
});
Route::match(['get', 'post'], '/admissions', function () {
    return view('admissions');
});
Route::match(['get', 'post'], '/alumni', function () {
    return view('alumni');
});
Route::match(['get', 'post'], '/about/briefhistory', function () {
    return view('briefhistory');
});
Route::get('/login', function () {
    return view('login');
});
Route::match(['get', 'post'], '/termservice', function () {
    return view('termservice');
});
Route::match(['get', 'post'], '/termsagreement', function () {
    return view('termsagreement');
});
Route::match(['get', 'post'], '/admissions/admissionrequirement', function () {
    return view('admissionrequirement');
});
Route::match(['get', 'post'], '/admissions/admissionprocedure', function () {
    return view('admissionprocedure');
});
Route::get('/institution', function(){
	return view('institution.home');
});

// admin
Route::group(['namespace' => 'Admin', 'prefix' => '/admin'], function() {

	Route::get('/login', function(){
		return view('admin.auth.login');
	});
	
	Route::get('/heartbeat/{admin}', 'HeartBeatController@beat');

	Route::get('/createmaster', 'AdminControllerAuth@createmaster');

	Route::get('/forgotpassword', 'AdminForgotPasswordController@index');

	Route::post('/masterkey', 'AdminControllerAuth@index');

	Route::get('/', 'AdminController@index');
			
	Route::get('/logout', 'AdminControllerAuth@logout');
	
	Route::post('/store', 'AdminUsersController@createUsers');

	Route::get('/users/update/{id}', 'AdminUsersController@updateUsers');

	Route::get('/users/getUpdate', 'AdminUsersController@getUpdate');

	Route::get('/destroy/{id}', 'AdminUsersController@destroyUsers');

	// Notification -------------------------------//
	Route::get('/notification', 'AdminNotificationController@index');

	Route::get('/notification-settings', function(){
		return view('admin.notification-settings');
	});
	// Storage -------------------------------//
	Route::get('/storage', 'StorageController@storage');

	Route::post('/storage/upload', 'StorageController@store');


	// Users -------------------------------//
	Route::get('/users', 'AdminUsersController@users');

	Route::get('users/createuser', 'AdminUsersController@createUsersIndex');

	Route::post('/adduser', 'AdminUsersController@createUsers');

	Route::get('/editaccountinfo/{id}', 'AdminUsersController@getUpdate');

	Route::get('/users/teachers', 'AdminTeacherUserController@index');

	Route::get('/users/teachers/teacheraccount', 'AdminUsersController@createTeacher');

	Route::get('/users/students/studentaccount', 'AdminUsersController@createStudent');

	Route::get('/users/parents/parentaccount', 'AdminUsersController@createParent');

	Route::post('/createusers', 'AdminUsersController@store');

	Route::post('/users/edit/{id}', 'AdminUsersController@Update');

	Route::post('/edit/teachers/account/{id}', 'AdminTeacherUserController@update');

	Route::post('/edit/students/account/{id}', 'AdminStudentUserController@update');

	Route::post('/edit/parents/account/{id}', 'AdminParentUserController@update');

	Route::post('/edit/adminpriviledge/{id}', 'AdminUsersController@adminPriviledge');

	Route::get('/users/students', 'AdminStudentUserController@index');

	Route::get('/users/parents', 'AdminParentUserController@index');

	Route::get('/users/admin', 'AdminController@adminIndex');

	// Taskmanager -------------------------------//
	Route::get('/taskmanager/account', function(){
		return view('admin.account');
	});


	// Subject -------------------------------//
	Route::get('/subject/section', 'AdminSectionController@index');

	Route::post('/subject/section/editsection/{id}', 'AdminSectionController@update');
	
	Route::post('/subject/section/addsection', 'AdminSectionController@create');

	Route::post('/subject/section/deletesection/{id}', 'AdminSectionController@destroy');

	Route::get('/subject/class', function(){
		return view('admin.class');
	});
	Route::get('/subject/schedule', 'AdminScheduleController@index');

	Route::get('/subject/schedule/manageschedule/{id}', 'AdminScheduleController@manage');

	Route::post('/subject/schedule/manageschedule/add', 'AdminScheduleController@store');

	Route::post('/subject/schedule/editadviser', 'AdminScheduleController@editAdviser');

	Route::get('/subject/schedule/unsetadviser', 'AdminScheduleController@unsetAdviser');
	
	Route::get('/subject', 'AdminSubjectController@index');

	Route::post('/subject/create', 'AdminSubjectController@create');

	// Grades -------------------------------//
	Route::get('/grades', function(){
		return view('admin.grades');
	});
	Route::get('/grades/grading-system', 'AdminGradesController@gradingSystem');

	Route::get('/grades/grading-system/view/{id}', 'AdminGradesController@view');

	// Account -------------------------------//
	
	Route::get('/account/profile', 'AdminController@profileIndex');

	Route::get('/account/account-settings', 'AdminProfileController@accountsettings');

	// Agenda -------------------------------//
	Route::get('/agenda/events', function(){
		return view('admin.events');
	});
	Route::get('/agenda/program', function(){
		return view('admin.program');
	});
	Route::get('/agenda/news', function(){
		return view('admin.news');
	});
	Route::get('/agenda/announcement', function(){
		return view('admin.announcement');
	});
	Route::get('/events/events&program', 'EventController@index');

	Route::post('/events/events&program/store', 'EventController@store');

	Route::get('/database/export', 'ExportController@index');

	Route::get('/database/export/ok', 'ExportController@export');

});

// teacher
Route::group(['namespace' => 'Teacher', 'prefix' => 'mrhs/teacher'], function() {

	Route::post('/login', 'TeacherAuthController@accesskey');

	Route::post('/post/act', 'PostController@store');

	Route::get('/logout', 'TeacherAuthController@logout');

	Route::get('/', 'TeacherController@index');

	Route::get('/read', 'TeacherController@data');

	Route::get('/heartbeat/{tid}', 'HeartBeatController@beat');

	Route::get('/checker1/{id}', 'CheckerController@section');

	Route::get('/checker2', 'CheckerController@student');

	Route::get('/manageclass', 'TeacherController@manageclass');

	Route::get('/addstudent/{sid}/{tid}/{sec}', 'ClassController@store');

	Route::get('/removestudent/{sid}/{sec}', 'ClassController@destroy');

	Route::get('/academics/class/activities', function(){
		return view('teacher.activities');
	});

	Route::get('/academics/class/assignment', function(){
		return view('teacher.assignment');
	});

	Route::get('/academics/class/submission', function(){
		return view('teacher.submission');
	});

	Route::get('/lessons', 'SubjectController@lessons');
	
	Route::get('/grades/{subject_id}', 'GradeController@grade');

	Route::post('/grades/save/{subject_id}', 'GradeController@store');

	Route::get('/lessons/{schedule_id}', 'PostController@index');

	Route::get('/academics/section', 'SectionController@section');

	Route::post('/academics/section/add', 'SectionController@addsection');

	Route::get('/academics/schedule', 'ScheduleController@schedule');

	Route::get('/academics/schedule/view/{id}', 'ScheduleController@view');

	Route::post('/academics/schedule/add/blankschedule', 'ScheduleController@addSchedule');

	Route::get('/academics/schedule/delete/{id}', 'ScheduleController@deleteSchedule');

	Route::get('/academics/advisory', 'AdvisoryController@index');
});

// student
Route::group(['namespace' => 'Student', 'prefix' => 'mrhs/student'], function() {

	Route::post('/login', 'StudentAuthController@studentAuth');

	Route::get('/', 'StudentController@index');

	Route::get('/logout', 'StudentAuthController@logout');


});