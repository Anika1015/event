@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100" style="background: #f8f9fa;">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 12px;">
        <div class="card-body">
            <h3 class="text-center mb-4" style="font-weight: bold; color: #333;">Login</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autofocus 
                           placeholder="Enter your email" style="border-radius: 8px;">
                    @error('email')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required placeholder="Enter your password" style="border-radius: 8px;">
                    @error('password')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg" 
                            style="border-radius: 8px; font-size: 18px; font-weight: bold;">
                        🔒 Login
                    </button>
                </div>

                <!-- Forgot Password & Register Link -->
                <div class="text-center mt-3">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none" href="{{ route('password.request') }}" 
                           style="color: #0d6efd; font-size: 14px;">
                            Forgot Password?
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

