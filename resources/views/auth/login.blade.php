@extends('layouts.app')

@section('title', 'Auth')

@section('content')
    <div class="layout">
        <!-- ── Right Panel ── -->
        <div class="panel-right">
            <div class="form-shell">

                <div class="form-heading">
                    <h1>Welcome back</h1>
                    <p>Don't have an account? <a href="{{ route('register') }}">Create one</a></p>
                </div>

                @if ($errors->any())
                    <div class="alert-error">
                        <span class="alert-error-icon">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <circle cx="7.5" cy="7.5" r="6.5" stroke="currentColor" stroke-width="1.4" />
                                <path d="M7.5 4.5V8M7.5 10v.5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                        </span>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="field">
                        <div class="field-row">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <rect x="1" y="3" width="13" height="9" rx="1.5" stroke="currentColor"
                                        stroke-width="1.3" />
                                    <path d="M1 5l6.5 4L14 5" stroke="currentColor" stroke-width="1.3" />
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="you@example.com" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                                autocomplete="email" autofocus>
                        </div>
                        @error('email')
                            <p class="error-msg">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <div class="field-row">
                            <label for="password">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-link">Forgot password?</a>
                            @endif
                        </div>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <rect x="3" y="6.5" width="9" height="7" rx="1.5" stroke="currentColor"
                                        stroke-width="1.3" />
                                    <path d="M5 6.5V4.5a2.5 2.5 0 015 0v2" stroke="currentColor" stroke-width="1.3"
                                        stroke-linecap="round" />
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" placeholder="••••••••"
                                class="{{ $errors->has('password') ? 'is-invalid' : '' }}" autocomplete="current-password">
                        </div>
                        @error('password')
                            <p class="error-msg">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="remember-row">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember me for 30 days</label>
                    </div>

                    <button type="submit" class="btn-submit">Sign In</button>

                </form>
            </div>
        </div>

    </div>
@endsection
