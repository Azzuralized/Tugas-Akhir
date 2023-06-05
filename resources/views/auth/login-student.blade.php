<!-- resources/views/auth/login-student.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Login</h1>

        <form method="POST" action="{{ route('login.student') }}">
            @csrf

            <!-- Add your student login form fields here -->
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection
