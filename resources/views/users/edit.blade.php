@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="page page-narrow">
        <a href="{{ route('users.index') }}" class="back-link">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path d="M9 11L5 7l4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            Back to Users
        </a>

        <div class="page-header">
            <div class="page-title">
                <h1 class="page-title">Edit User</h1>
                <p class="page-subtitle">Update account details below.</p>
            </div>
            <div class="user-badge">
                <div class="user-badge-avatar">{{ mb_substr($user->name, 0, 1) }}</div>
                <span>ID #{{ $user->id }} · {{ $user->email }}</span>
            </div>
        </div>

        <div class="card">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <p class="section-label">Account Info</p>

                <div class="field">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Jane Doe"
                        value="{{ old('name', $user->name) }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                        autocomplete="name">
                    @error('name')
                        <p class="error-msg">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4" />
                                <path d="M6 4v2.5M6 8v.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="jane@example.com"
                        value="{{ old('email', $user->email) }}" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        autocomplete="email">
                    @error('email')
                        <p class="error-msg">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                <circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4" />
                                <path d="M6 4v2.5M6 8v.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" />
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="password-section">
                    <p class="section-label">Change Password</p>
                    <div class="field" style="margin-bottom:0">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" placeholder="Leave blank to keep current"
                            class="{{ $errors->has('password') ? 'is-invalid' : '' }}" autocomplete="new-password">
                        @error('password')
                            <p class="error-msg">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4" />
                                    <path d="M6 4v2.5M6 8v.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" />
                                </svg>
                                {{ $message }}
                            </p>
                        @else
                            <p class="field-hint">
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                                    <circle cx="5.5" cy="5.5" r="4.5" stroke="currentColor" stroke-width="1.2" />
                                    <path d="M5.5 3.5v2M5.5 7v.5" stroke="currentColor" stroke-width="1.2"
                                        stroke-linecap="round" />
                                </svg>
                                Only fill this if you want to update the password.
                            </p>
                        @enderror
                    </div>
                </div>

                <hr class="divider">

                <div class="form-actions">
                    <a href="{{ route('users.index') }}" class="btn btn-ghost">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                            <path d="M2 7l3.5 3.5L11 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
