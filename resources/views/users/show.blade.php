<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail — Admin</title>
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
            --radius: 10px;
            --radius-sm: 6px;
            --shadow: 0 1px 3px rgba(0,0,0,0.4), 0 8px 24px rgba(0,0,0,0.3);
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            min-height: 100vh;
            padding: 40px 24px;
        }

        .page { max-width: 520px; margin: 0 auto; }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 13px;
            margin-bottom: 28px;
            transition: color 0.15s;
        }
        .back-link:hover { color: var(--text); }

        /* Avatar block */
        .profile-block {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 28px;
        }
        .profile-avatar {
            width: 60px; height: 60px;
            border-radius: 50%;
            background: var(--accent-soft);
            border: 2px solid var(--accent-glow);
            display: flex; align-items: center; justify-content: center;
            font-size: 22px;
            font-weight: 600;
            color: var(--accent);
            text-transform: uppercase;
            flex-shrink: 0;
        }
        .profile-name {
            font-size: 20px;
            font-weight: 600;
            letter-spacing: -0.2px;
        }
        .profile-meta {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 2px;
        }

        /* Card */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-bottom: 16px;
        }

        /* Detail rows */
        .detail-row {
            display: flex;
            align-items: flex-start;
            padding: 14px 20px;
            border-bottom: 1px solid var(--border);
            gap: 24px;
        }
        .detail-row:last-child { border-bottom: none; }
        .detail-label {
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.07em;
            text-transform: uppercase;
            color: var(--text-muted);
            min-width: 90px;
            padding-top: 1px;
            flex-shrink: 0;
        }
        .detail-value { font-size: 14px; color: var(--text); word-break: break-all; }
        .detail-value.mono {
            font-family: 'DM Mono', monospace;
            font-size: 13px;
            color: var(--accent);
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 20px;
            border-radius: var(--radius-sm);
            font-family: inherit;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            border: 1px solid transparent;
            text-decoration: none;
            transition: all 0.18s ease;
            line-height: 1;
        }
        .btn-primary {
            background: var(--accent);
            color: #fff;
            border-color: var(--accent);
        }
        .btn-primary:hover {
            background: #8aabff;
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
        .btn-danger-outline {
            background: transparent;
            color: var(--danger);
            border-color: rgba(255,107,107,0.25);
        }
        .btn-danger-outline:hover {
            background: var(--danger-soft);
            border-color: var(--danger);
        }
    </style>
</head>
<body>
<div class="page">

    <a href="{{ route('users.index') }}" class="back-link">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M9 11L5 7l4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
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
        @if($user->created_at)
        <div class="detail-row">
            <span class="detail-label">Created</span>
            <span class="detail-value">{{ $user->created_at->format('d M Y, H:i') }}</span>
        </div>
        @endif
        @if($user->updated_at)
        <div class="detail-row">
            <span class="detail-label">Updated</span>
            <span class="detail-value">{{ $user->updated_at->format('d M Y, H:i') }}</span>
        </div>
        @endif
    </div>

    <div class="actions">
        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary">
            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M8.5 1.5l2 2L3 11H1V9L8.5 1.5z" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round"/></svg>
            Edit User
        </a>
        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger-outline"
                onclick="return confirm('Delete {{ $user->name }}? This cannot be undone.')">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><path d="M1.5 3h9M4 3V2h4v1M5 5v4M7 5v4M2.5 3l.5 7h6l.5-7" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Delete
            </button>
        </form>
    </div>

</div>
</body>
</html>