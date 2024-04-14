<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/Dashboard/dashboard', function () {
//     return view('Dashboard/dashboard');
// });

Route::middleware(['guest'])->group(function () {

    Auth::routes();

    // Login
    Route::get('/', [App\Http\Controllers\Auth\LoginController::class,'index']);

    // Login User
    Route::post('/login/login_user', [App\Http\Controllers\Auth\LoginController::class,'login'])->name('login_user');

});

Route::middleware(['auth'])->group(function () {

    // Logout
    Route::post('/login/logout_user', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout_user');

    // Dashboard
    Route::get('/Dashboard/dashboard', [App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');


    // Student
    Route::get('/Students/students', [App\Http\Controllers\StudentController::class,'index'])->name('student');


    // Grade
    Route::get('/GradeLevel/grade', [App\Http\Controllers\GradeLevelController::class,'index'])->name('grade');
    // Grade Store
    Route::post('/GradeLevel/grade/grade_store', [App\Http\Controllers\GradeLevelController::class,'store'])->name('grade_store');
    // Grade Update
    Route::post('/GradeLevel/grade/grade_update', [App\Http\Controllers\GradeLevelController::class,'update'])->name('grade_update');
    // Grade Destroy
    Route::post('/GradeLevel/grade/grade_destroy', [App\Http\Controllers\GradeLevelController::class,'destroy'])->name('grade_destroy');


    // Section
    Route::get('/Section/section', [App\Http\Controllers\SectionController::class,'index'])->name('section');
    // Section Store
    Route::post('/Section/section/section_store', [App\Http\Controllers\SectionController::class,'store'])->name('section_store');
    // Section Update
    Route::post('/Section/section/section_update', [App\Http\Controllers\SectionController::class,'update'])->name('section_update');
    // Section Destroy
    Route::post('/Section/section/section_destroy', [App\Http\Controllers\SectionController::class,'destroy'])->name('section_destroy');


    // Subject
    Route::get('/Subject/subject', [App\Http\Controllers\SubjectController::class,'index'])->name('subject');
    // Subject Store
    Route::post('/Subject/subject/subject_store', [App\Http\Controllers\SubjectController::class,'store'])->name('subject_store');
    // Subject Update
    Route::post('/Subject/subject/subject_update', [App\Http\Controllers\SubjectController::class,'update'])->name('subject_update');
    // Subject Destroy
    Route::post('/Subject/subject/subject_destroy', [App\Http\Controllers\SubjectController::class,'destroy'])->name('subject_destroy');


    // Teacher
    Route::get('/Teacher/teacher', [App\Http\Controllers\TeacherController::class,'index'])->name('teacher');


    // Class
    Route::get('/Class/class', [App\Http\Controllers\ClassController::class,'index'])->name('class');


    // Payments
    Route::get('/Payments/payments', [App\Http\Controllers\PaymentsController::class,'index'])->name('payments');


    // Settings | Roles and Permissions
    Route::get('/RolesandPermissions/rolesandpermissions', [App\Http\Controllers\RolesAndPermissionsController::class,'index'])->name('rolesandpermissions');

});


