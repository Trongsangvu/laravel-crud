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

        <div class="profile-block">
            <div class="profile-avatar">{{ mb_substr($user->name, 0, 1) }}</div>
            <div>
                <div class="profile-name">{{ $user->name }}</div>
                <div class="profile-meta">{{ $user->email }}</div>
            </div>
        </div>

        <div class="card">
            <div class="detail-row">
                <span class="detail-label">User ID</span>
                <span class="detail-value mono">#{{ $user->id }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Name</span>
                <span class="detail-value">{{ $user->name }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Email</span>
                <span class="detail-value">{{ $user->email }}</span>
            </div>
            @if ($user->created_at)
                <div class="detail-row">
                    <span class="detail-label">Created</span>
                    <span class="detail-value">{{ $user->created_at->format('d M Y, H:i') }}</span>
                </div>
            @endif
            @if ($user->updated_at)
                <div class="detail-row">
                    <span class="detail-label">Updated</span>
                    <span class="detail-value">{{ $user->updated_at->format('d M Y, H:i') }}</span>
                </div>
            @endif
        </div>

        <div class="actions">
            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                    <path d="M8.5 1.5l2 2L3 11H1V9L8.5 1.5z" stroke="currentColor" stroke-width="1.4"
                        stroke-linejoin="round" />
                </svg>
                Edit User
            </a>
            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger-outline"
                    onclick="return confirm('Delete {{ $user->name }}? This cannot be undone.')">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M1.5 3h9M4 3V2h4v1M5 5v4M7 5v4M2.5 3l.5 7h6l.5-7" stroke="currentColor" stroke-width="1.3"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection
