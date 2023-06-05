<!-- resources/views/auth/login-teacher.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Teacher Login</h1>

        <form method="POST" action="{{ route('login.teacher') }}">
            @csrf

            <!-- Add your teacher login form fields here -->
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
