<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Student Registration Routes
Route::get('/register/student', [RegisteredUserController::class, 'createStudent'])->name('register.student');
Route::post('/register/student', [RegisteredUserController::class, 'storeStudent']);

// Teacher Registration Routes
Route::get('/register/teacher', [RegisteredUserController::class, 'createTeacher'])->name('register.teacher');
Route::post('/register/teacher', [RegisteredUserController::class, 'storeTeacher']);

// Student Login Routes
Route::get('/login/student', [AuthenticatedSessionController::class, 'createStudent'])->name('login.student');
Route::post('/login/student', [AuthenticatedSessionController::class, 'storeStudent']);

// Teacher Login Routes
Route::get('/login/teacher', [AuthenticatedSessionController::class, 'createTeacher'])->name('login.teacher');
Route::post('/login/teacher', [AuthenticatedSessionController::class, 'storeTeacher']);


Route::middleware(['auth', 'role:teacher'])->group(function () {
    // Routes that require "teacher" role
});

Route::middleware(['auth', 'role:student'])->group(function () {
    // Routes that require "student" role
});

require __DIR__.'/auth.php';