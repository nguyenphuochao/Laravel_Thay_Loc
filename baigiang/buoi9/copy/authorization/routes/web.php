<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\TestController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('students/export', StudentController::class.'@export')->name('students.export');  
Route::get('students/formImport', StudentController::class.'@formImport')->name('students.formImport');
Route::post('students/import', StudentController::class.'@import')->name('students.import');  
Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
Route::resource('registers', RegisterController::class);
Route::get('students/{id}/subjects/unregistered', SubjectController::class."@unregistered")->name('student.subjects.unregistered');

Route::get('test', TestController::class.'@test');

Route::redirect('/', route("students.index"), 301);
Auth::routes(['verify' => true]);

Route::redirect('home', route("students.index"), 301);
