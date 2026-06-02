@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="page">
        <div class="page-header">
            <div class="page-title">
                Users
                <span>Manage all registered accounts</span>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <svg width="13" height="13" viewBox="0 0 13 13" fill="none">
                    <path d="M6.5 1v11M1 6.5h11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
                New User
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <span class="alert-dot"></span>
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th style="text-align:right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="cell-id">{{ $user->id }}</td>
                            <td class="cell-name">
                                <div class="avatar">
                                    <div class="avatar-circle">{{ mb_substr($user->name, 0, 1) }}</div>
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="cell-email">{{ $user->email }}</td>
                            <td>
                                <div class="cell-actions">
                                    <a href="{{ route('users.show', $user) }}" class="btn btn-ghost btn-sm">View</a>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-ghost btn-sm">Edit</a>
                                    <div class="action-divider"></div>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete {{ $user->name }}?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <div class="empty">
                                    <div class="empty-icon">👤</div>
                                    <strong>No users yet</strong>
                                    <p>Create your first user to get started.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if ($users->hasPages())
                <div class="pagination-wrap">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
