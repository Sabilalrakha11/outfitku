@extends('layout')

@section('content')
<div class="auth-wrapper">
    <div class="auth-box">
        <h1 class="auth-title">LOGIN</h1>
        <p class="auth-subtitle">Masuk ke akun Outfitology Anda</p>
        @error('email')
    <div style="color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center; font-size: 14px;">
        ⚠️ {{ $message }}
    </div>
@enderror

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div style="text-align: right; margin-bottom: 15px;">
    <a href="{{ route('password.request') }}" style="color: #0A192F; text-decoration: none; font-size: 14px;">Lupa Password?</a>
</div>

            <button type="submit" class="btn-primary">Login</button>
        </form>

        <p class="auth-footer">
            Belum punya akun?
            <a href="{{ route('register') }}">Daftar</a>
        </p>
    </div>
</div>
@endsection
