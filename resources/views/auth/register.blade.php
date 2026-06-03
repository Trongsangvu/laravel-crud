@extends('layouts.app')

@section('title', 'Auth')

@section('content')
    <div class="layout">
        <!-- ── Right Panel ── -->
        <div class="panel-right">
            <div class="form-shell form-shell--wide">

                <div class="form-heading form-heading--tight">
                    <h1>Create account</h1>
                    <p>Already have one? <a href="{{ route('login') }}">Sign in</a></p>
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

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="field">
                        <label for="name">Full Name</label>
                        <div class="input-wrap">
                            <span class="input-icon">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                                    <circle cx="7.5" cy="5" r="3" stroke="currentColor" stroke-width="1.3" />
                                    <path d="M1.5 13c0-2.761 2.686-5 6-5s6 2.239 6 5" stroke="currentColor"
                                        stroke-width="1.3" stroke-linecap="round" />
                                </svg>
                            </span>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Jane Doe" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                                autocomplete="name" autofocus>
                        </div>
                        @error('name')
                            <p class="error-msg">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="email">Email Address</label>
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
                                autocomplete="email">
                        </div>
                        @error('email')
                            <p class="error-msg">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="field-grid">
                        <div class="field" style="margin-bottom:0">
                            <label for="password">Password</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                                        <rect x="3" y="6.5" width="9" height="7" rx="1.5"
                                            stroke="currentColor" stroke-width="1.3" />
                                        <path d="M5 6.5V4.5a2.5 2.5 0 015 0v2" stroke="currentColor" stroke-width="1.3"
                                            stroke-linecap="round" />
                                    </svg>
                                </span>
                                <input type="password" id="password" name="password" placeholder="Min. 8 chars"
                                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}" autocomplete="new-password">
                            </div>
                            <div class="strength-bar">
                                <div class="strength-seg" id="s1"></div>
                                <div class="strength-seg" id="s2"></div>
                                <div class="strength-seg" id="s3"></div>
                                <div class="strength-seg" id="s4"></div>
                            </div>
                            @error('password')
                                <p class="error-msg">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="field" style="margin-bottom:0">
                            <label for="password_confirmation">Confirm</label>
                            <div class="input-wrap">
                                <span class="input-icon">
                                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                                        <rect x="3" y="6.5" width="9" height="7" rx="1.5"
                                            stroke="currentColor" stroke-width="1.3" />
                                        <path d="M5 6.5V4.5a2.5 2.5 0 015 0v2" stroke="currentColor" stroke-width="1.3"
                                            stroke-linecap="round" />
                                    </svg>
                                </span>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    placeholder="Repeat password" autocomplete="new-password">
                            </div>
                        </div>
                    </div>

                    <div class="terms-row" style="margin-top:20px">
                        <input type="checkbox" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }}>
                        <label for="terms">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy
                                Policy</a>
                        </label>
                    </div>

                    <button type="submit" class="btn-submit">Create Account</button>

                </form>
            </div>
        </div>

    </div>

@section('scripts')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection
