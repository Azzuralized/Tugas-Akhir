<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ...

// Login Routes
Route::get('/login/student', [AuthenticatedSessionController::class, 'showStudentLoginForm'])->name('login.student');
Route::post('/login/student', [AuthenticatedSessionController::class, 'loginStudent']);
Route::get('/login/teacher', [AuthenticatedSessionController::class, 'showTeacherLoginForm'])->name('login.teacher');
Route::post('/login/teacher', [AuthenticatedSessionController::class, 'loginTeacher']);

// ...
// Routes that require "teacher" role
Route::middleware(['auth', 'role:teacher'])->group(function () {
    // Add your routes for teachers here
});

// Routes that require "student" role
Route::middleware(['auth', 'role:student'])->group(function () {
    // Add your routes for students here
});

// Include the auth routes
require __DIR__.'/auth.php';
