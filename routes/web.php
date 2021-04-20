<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('resume', function () {
    return Redirect::route('info.index');
})->name('resume');



Auth::routes();

// Homepage
Route::get('/','HomeController@index')->name('index');

// Training
Route::get('training/graphics-design','HomeController@graphics_design')->name('graphics.design');
Route::get('training/digital-marketing','HomeController@digital_marketing')->name('digital.marketing');

// Contact
Route::get('contact','HomeController@contact')->name('contact');

// Circular
// Job Circular
Route::resource('circular/job','JobController');
Route::resource('circular/application','ApplicationController');
Route::post('circular/search','HomeController@search')->name('job.search');
// Quiz
Route::resource('quiz','QuizController');

// User

// User Profile
Route::resource('profile','ProfileController');

// Resume
Route::resource('resume/preview','ResumeController');
Route::resource('resume/info','InfoController');
Route::resource('resume/skill','SkillController');
Route::resource('resume/education','EducationController');
Route::resource('resume/project','ProjectController');

// Circular
// My Application
Route::resource('circular/myapplication','MyApplicationController');

// Employer
// User Management
Route::resource('user','UserController')->middleware('is_admin');
Route::post('user/update', 'UserController@update')->name('user.update');
Route::get('user/destroy/{id}', 'UserController@destroy')->name('user.destroy');

// Circular
// My Job Circular
Route::resource('circular/myjob','MyJobController')->middleware('is_admin');
Route::resource('circular/applicant','ApplicantController')->middleware('is_admin');
Route::get('circular/applicant/select/{application_id}', 'ApplicantController@select')->name('application.select')->middleware('is_admin');
Route::get('circular/applicant/disqualify/{application_id}', 'ApplicantController@disqualify')->name('application.disqualify')->middleware('is_admin');

// Quiz
// Question
Route::resource('quizquestion','QuizQuestionController')->middleware('is_admin');


