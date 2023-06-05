<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Show the student login form.
     */
    public function showStudentLoginForm()
    {
        return view('auth.login-student');
    }

    /**
     * Show the teacher login form.
     */
    public function showTeacherLoginForm()
    {
        return view('auth.login-teacher');
    }

    /**
     * Handle a student login request.
     */
    public function loginStudent(Request $request)
    {
        // Login logic for student
    }

    /**
     * Handle a teacher login request.
     */
    public function loginTeacher(Request $request)
    {
        // Login logic for teacher
    }

    /**
     * Log the user out of the application.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
