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

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('adminauth')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
});

// Rutas para el CRUD de Administradores
use App\Http\Controllers\Admin\AdminController;


Route::prefix('admin')->group(function () {
    // Rutas de autenticación
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Rutas protegidas
    Route::middleware('adminauth')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('admins', AdminController::class)->names('admin.admins');
    });
});

//Rutas para el CRUD de Alumnos

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CourseController;


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
    });
});