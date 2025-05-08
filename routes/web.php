<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Prueba de Hola Mundo 
use App\Http\Controllers\PruebaController;
Route::get('/prueba/hola-mundo', [PruebaController::class, 'holaMundo'])
    ->name('prueba.hola-mundo');


/*--------------------------------Rutas de admin-----------------------------------------*/
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\ScheduleController;

/* RUTAS DEL ADMINISTRADOR*/ 
Route::prefix('admin')->group(function () {
    // Rutas de autenticación
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Rutas protegidas
    Route::middleware('adminauth')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('admins', AdminController::class)->names('admin.admins');
        Route::resource('students', StudentController::class)->names('admin.students');
        Route::resource('teachers', TeacherController::class)->names('admin.teachers');
        Route::resource('courses', CourseController::class)->names('admin.courses');
        Route::resource('subjects', SubjectController::class)->names('admin.subjects');
        Route::resource('groups', GroupController::class)->names('admin.groups');
        Route::resource('grades', GradeController::class)->names('admin.grades');
        Route::resource('schedules', ScheduleController::class)->names('admin.schedules');
    });
});

/* RUTAS DE ESTUDIANTES ALUMNOS */
use App\Http\Controllers\Student\StudentAuthController;
use App\Http\Controllers\Student\StudentDashboardController;

Route::prefix('student')->group(function () {
    Route::get('/login', [StudentAuthController::class, 'showLoginForm'])->name('student.login');
    Route::post('/login', [StudentAuthController::class, 'login'])->name('student.login.post');
    Route::post('/logout', [StudentAuthController::class, 'logout'])->name('student.logout');

    Route::middleware('studentauth')->group(function () {
        Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    });
});

/* RUTAS DE PROFESORES/DOCENTES */ 
use App\Http\Controllers\Teacher\TeacherAuthController;
use App\Http\Controllers\Teacher\TeacherDashboardController;

Route::prefix('teacher')->group(function () {
    Route::get('/login', [TeacherAuthController::class, 'showLoginForm'])->name('teacher.login');
    Route::post('/login', [TeacherAuthController::class, 'login'])->name('teacher.login.post');
    Route::post('/logout', [TeacherAuthController::class, 'logout'])->name('teacher.logout');

    Route::middleware('teacherauth')->group(function () {
        Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
    });
});