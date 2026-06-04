@extends('layouts.app')

@section('title', '403 — Forbidden')
@section('body-class', 'error-page')

@section('content')
    <div class="error-shell">
        <div class="error-card">
            <div class="error-icon">
                <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                    <path d="M14 3L3 24h22L14 3z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round" />
                    <path d="M14 11v6M14 19.5v1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </div>

            <h1 class="error-code">403</h1>

            <hr class="error-rule">

            <p class="error-desc">
                You don't have permission to view this page.<br>
                This area is restricted to <strong>administrators</strong> only.
            </p>

            <div class="error-actions">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">
                    Go to Dashboard
                </a>
            </div>
        </div>
    </div>
@endsection
