<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Route::filter('auth', function()
// {
//     if ( Auth::guest() ) // If the user is not logged in
//     {
//         // Set the loginRedirect session variable
//         Session::put( 'loginRedirect', Request::url() );

//         // Redirect back to user login
//         return Redirect::to( 'user/login');
//     }
// });

// Route::when('studentregistrations*', 'auth'); 
// Route::when('assigncourses*', 'auth'); 
// Route::when('feecollections*', 'auth'); 


// Confide routes

Route::get( '/',                		   'UserController@login');
Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');

Route::resource('feecollections', 'FeecollectionController');
Route::resource('assigncourses', 'AssigncoursesController');

Route::get('assigncourseseditview/{id}', 'AssigncoursesController@editview');

Route::resource('studentregistrations', 'StudentregistrationsController');

Route::resource('coursecategories', 'CoursecategoriesController');

Route::resource('coursemasters', 'CoursemastersController');

Route::resource('coursebatches', 'CoursebatchesController');

Route::resource('optionalsubjects', 'OptionalsubjectsController');

Route::resource('feesmasters', 'FeesmastersController');

Route::resource('feedetails', 'FeedetailsController');

Route::post('getstudentdetails/{id}',    'StudentregistrationsController@getdetails');

Route::post('paySubmit',    'FeedetailsController@pay');

Route::post('getfeedetails/{id}',    'FeedetailsController@getdetails');

Route::post('getavailablecourses/{ids}',    'AssigncoursesController@getavailablecourses');

Route::post('getselectedcourses/{id}',    'AssigncoursesController@getselectedcourses');

Route::post('getstudentfeesdetails/{id}',    'FeecollectionController@getstudentfeesdetails');
Route::get('search/{id}',    'FeecollectionController@search');

Route::post('getstudentfeesdetailsbyname/{name}',    'FeecollectionController@getstudentfeesdetailsbyname');

Route::get('pay/{id}',    'FeecollectionController@pay');



Route::post('paid',    'FeecollectionController@paid');

Route::get('paidAfter/{id}',    'FeecollectionController@paidAfter');

Route::get('getPdf/{id}',    'FeecollectionController@getPDF');
Route::get('getinitial/{id}',    'StudentregistrationsController@getPDF');


Route::post('getstudentsearchdetails/{search}',    'StudentregistrationsController@getStudentDetails');
Route::post('getstudentsearchdetailsid/{search}',    'StudentregistrationsController@getStudentDetailsId');
Route::post('getstudentsearchassigndetails/{search}',    'AssigncoursesController@getStudentDetails');
Route::post('getstudentsearchassigndetailsid/{search}',    'AssigncoursesController@getStudentDetailsId');

Route::post('getstudentsearchfees/{search}',    'FeecollectionController@getStudentDetails');
Route::post('getstudentsearchfeesid/{search}',    'FeecollectionController@getStudentDetailsId');


Route::get('reports/students',    'ReportsController@getstudents');
Route::get('reports/getstudentspdf',    'ReportsController@getstudentspdf');


Route::get('reports/feepending',    'ReportsController@getfeepending');
Route::get('reports/getfeependingpdf',    'ReportsController@getfeependingpdf');


Route::get('reports/feecollection',    'ReportsController@getfeecollection');
Route::get('reports/getFeeCollectionPdf',    'ReportsController@getfeecollectionpdf');


Route::get('reports/installmentpending',    'ReportsController@installmentpending');

Route::get('reports/studentdetails',    'ReportsController@getstudentdetail');
Route::get('reports/studentdetailspdf',    'ReportsController@getstudentdetailpdf');
Route::get('dashboard',    'DashboardController@index');

Route::post('getinstallmentpending/{date}',    'ReportsController@getinstallmentpending');

Route::get('reports/getinstallmentpendingpdf/{date}',    'ReportsController@getinstallmentpendingpdf');



Route::post('getstudentnamereport/{name}',    'ReportsController@getstudentnamereport');
Route::post('getstudentidreport/{id}',    'ReportsController@getstudentidreport');

Route::post('getstudentcoursereport/{course}',    'ReportsController@getstudentcoursereport');
Route::post('getstudentbatchreport/{batch}',    'ReportsController@getstudentbatchreport');