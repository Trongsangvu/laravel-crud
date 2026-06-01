<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users — Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0f1117;
            --surface: #1a1d27;
            --surface-2: #22263a;
            --border: rgba(255,255,255,0.07);
            --border-hover: rgba(255,255,255,0.14);
            --text: #e8eaf0;
            --text-muted: #6b7280;
            --text-dim: #9ca3af;
            --accent: #6c8fff;
            --accent-soft: rgba(108,143,255,0.12);
            --accent-glow: rgba(108,143,255,0.25);
            --danger: #ff6b6b;
            --danger-soft: rgba(255,107,107,0.1);
            --success: #52c48a;
            --success-soft: rgba(82,196,138,0.12);
            --radius: 10px;
            --radius-sm: 6px;
            --shadow: 0 1px 3px rgba(0,0,0,0.4), 0 4px 16px rgba(0,0,0,0.3);
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            min-height: 100vh;
            padding: 40px 24px;
        }

        /* ── Layout ── */
        .page { max-width: 900px; margin: 0 auto; }

        /* ── Header ── */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }
        .page-title {
            font-size: 22px;
            font-weight: 600;
            letter-spacing: -0.3px;
            color: var(--text);
        }
        .page-title span {
            display: block;
            font-size: 12px;
            font-weight: 400;
            color: var(--text-muted);
            margin-top: 2px;
            letter-spacing: 0;
        }

        /* ── Buttons ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid transparent;
            text-decoration: none;
            transition: all 0.18s ease;
            line-height: 1;
            white-space: nowrap;
        }
        .btn-primary {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent);
        }
        .btn-primary:hover {
            background: #8aabff;
            border-color: #8aabff;
            box-shadow: 0 0 0 3px var(--accent-glow);
        }
        .btn-ghost {
            background: transparent;
            color: var(--text-dim);
            border-color: var(--border);
        }
        .btn-ghost:hover {
            color: var(--text);
            border-color: var(--border-hover);
            background: var(--surface-2);
        }
        .btn-danger {
            background: transparent;
            color: var(--danger);
            border-color: transparent;
            padding: 6px 10px;
        }
        .btn-danger:hover {
            background: var(--danger-soft);
        }
        .btn-sm {
            padding: 5px 11px;
            font-size: 12px;
        }

        /* ── Alert ── */
        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 16px;
            border-radius: var(--radius);
            margin-bottom: 20px;
            font-size: 13px;
            border: 1px solid;
        }
        .alert-success {
            background: var(--success-soft);
            border-color: rgba(82,196,138,0.25);
            color: var(--success);
        }
        .alert-dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: currentColor;
            flex-shrink: 0;
        }

        /* ── Card ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        /* ── Table ── */
        table { width: 100%; border-collapse: collapse; }
        thead { background: var(--surface-2); }
        th {
            padding: 11px 16px;
            text-align: left;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-muted);
        }
        td {
            padding: 13px 16px;
            border-top: 1px solid var(--border);
            vertical-align: middle;
        }
        tbody tr { transition: background 0.12s; }
        tbody tr:hover { background: rgba(255,255,255,0.025); }

        .cell-id {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: var(--text-muted);
            width: 56px;
        }
        .cell-name { font-weight: 500; }
        .cell-email { color: var(--text-dim); font-size: 13px; }
        .cell-actions {
            display: flex;
            align-items: center;
            gap: 4px;
            justify-content: flex-end;
        }

        /* Avatar chip */
        .avatar {
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        .avatar-circle {
            width: 30px; height: 30px;
            border-radius: 50%;
            background: var(--accent-soft);
            border: 1px solid var(--accent-glow);
            display: flex; align-items: center; justify-content: center;
            font-size: 11px;
            font-weight: 600;
            color: var(--accent);
            flex-shrink: 0;
            text-transform: uppercase;
        }

        /* ── Pagination ── */
        .pagination-wrap {
            padding: 14px 16px;
            border-top: 1px solid var(--border);
            display: flex;
            justify-content: flex-end;
        }
        .pagination-wrap nav { display: flex; gap: 4px; }
        .pagination-wrap .page-link, .pagination-wrap span {
            display: inline-flex; align-items: center; justify-content: center;
            min-width: 32px; height: 32px; padding: 0 10px;
            border-radius: var(--radius-sm);
            font-size: 12px; font-family: inherit;
            color: var(--text-dim);
            background: transparent;
            border: 1px solid var(--border);
            text-decoration: none;
            transition: all 0.15s;
        }
        .pagination-wrap .page-link:hover {
            background: var(--surface-2);
            color: var(--text);
        }
        .pagination-wrap .active .page-link,
        .pagination-wrap span[aria-current] {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent);
        }

        /* ── Empty state ── */
        .empty {
            text-align: center;
            padding: 56px 24px;
            color: var(--text-muted);
        }
        .empty-icon { font-size: 36px; margin-bottom: 12px; opacity: 0.4; }
        .empty p { font-size: 13px; margin-top: 6px; }

        /* ── Divider ── */
        .action-divider {
            width: 1px; height: 14px;
            background: var(--border);
            margin: 0 2px;
        }
    </style>
</head>
<body>
<div class="page">

    <div class="page-header">
        <div class="page-title">
            Users
            <span>Manage all registered accounts</span>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M6.5 1v11M1 6.5h11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            New User
        </a>
    </div>

    @if(session('success'))
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
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
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

        @if($users->hasPages())
        <div class="pagination-wrap">
            {{ $users->links() }}
        </div>
        @endif
    </div>

</div>
</body>
</html>