@extends('layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="page page-narrow">
        <a href="{{ route('users.index') }}" class="back-link">
            <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path d="M9 11L5 7l4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            Back to Users
        </a>

        <h1 class="page-title">Create User</h1>
        <p class="page-subtitle">Add a new account to the system.</p>

        <div class="card">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="field">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Jane Doe" value="{{ old('name') }}"
                        class="{{ $errors->has('name') ? 'is-invalid' : '' }}" autocomplete="name">
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
                        value="{{ old('email') }}" class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
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

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Min. 8 characters"
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
                        <p class="field-hint">Must be at least 8 characters.</p>
                    @enderror
                </div>

                <hr class="divider">

                <div class="form-actions">
                    <a href="{{ route('users.index') }}" class="btn btn-ghost">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                            <path d="M2 7l3.5 3.5L11 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
