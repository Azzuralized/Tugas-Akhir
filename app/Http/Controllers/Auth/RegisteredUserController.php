<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Show the student registration form.
     */
    public function showStudentRegistrationForm(): View
    {
        return view('auth.register-student');
    }

  /**
 * Handle a student registration request.
 *
 * @throws \Illuminate\Validation\ValidationException
 */
public function registerStudent(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Create a new User instance
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->type = 'student';

    // Save the user record in the database
    $user->save();

    // Fire the registered event
    event(new Registered($user));

    // Log in the user
    Auth::login($user);

    // Redirect the user after registration
    return redirect(RouteServiceProvider::HOME);
}

/**
 * Handle a teacher registration request.
 *
 * @throws \Illuminate\Validation\ValidationException
 */
public function registerTeacher(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Create a new User instance
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->type = 'teacher';

    // Save the user record in the database
    $user->save();

    // Fire the registered event
    event(new Registered($user));

    // Log in the user
    Auth::login($user);

    // Redirect the user after registration
    return redirect(RouteServiceProvider::HOME);
}
}