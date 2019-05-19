<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api'], function () {
    Route::get('/', 'HomeController@index');

    Route::apiResource('students', 'StudentController');
    Route::get('students/{student}/classes', 'StudentController@getClasses');

    Route::get('classes/schedule', 'ClassesController@getDailySchedule');
    Route::apiResource('classes', 'ClassesController');
    Route::get('classes/{class}/students', 'ClassesController@getStudents');

    Route::apiResource('teachers', 'TeacherController');

    Route::post('/student-classes', 'StudentClassesController@addStudentToClass');
    Route::delete('/student-classes', 'StudentClassesController@removeStudentFromClass');
});
