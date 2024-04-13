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

Route::get('/', function () {
    return redirect()->route('login');
});


// Dashboard
Route::get('/Dashboard/dashboard',['App\Http\Controllers\DashboardController','index'])->name('dashboard');


// Student
Route::get('/Students/students',['App\Http\Controllers\StudentController','index'])->name('student');


// Grade
Route::get('/GradeLevel/grade',['App\Http\Controllers\GradeLevelController','index'])->name('grade');


// Section
Route::get('/Section/section',['App\Http\Controllers\SectionController','index'])->name('section');


// Subject
Route::get('/Subject/subject',['App\Http\Controllers\SubjectController','index'])->name('subject');


// Teacher
Route::get('/Teacher/teacher',['App\Http\Controllers\TeacherController','index'])->name('teacher');


// Class
Route::get('/Class/class',['App\Http\Controllers\ClassController','index'])->name('class');


// Payments
Route::get('/Payments/payments',['App\Http\Controllers\PaymentsController','index'])->name('payments');


// Settings | Roles and Permissions
Route::get('/RolesandPermissions/rolesandpermissions',['App\Http\Controllers\RolesAndPermissionsController','index'])->name('rolesandpermissions');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
