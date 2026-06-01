<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User — Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --bg: #0f1117;
            --surface: #1a1d27;
            --surface-2: #22263a;
            --border: rgba(255,255,255,0.07);
            --border-hover: rgba(255,255,255,0.14);
            --border-focus: rgba(108,143,255,0.55);
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

        /* ── Back link ── */
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

        /* ── Page title ── */
        .page-title {
            font-size: 22px;
            font-weight: 600;
            letter-spacing: -0.3px;
            margin-bottom: 4px;
        }
        .page-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 28px;
        }

        /* ── Card ── */
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 28px;
            box-shadow: var(--shadow);
        }

        /* ── Form fields ── */
        .field { margin-bottom: 20px; }
        .field:last-child { margin-bottom: 0; }

        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--text-dim);
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            background: var(--surface-2);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            color: var(--text);
            font-family: inherit;
            font-size: 14px;
            padding: 10px 14px;
            outline: none;
            transition: border-color 0.18s, box-shadow 0.18s;
            -webkit-appearance: none;
        }
        input::placeholder { color: var(--text-muted); }
        input:hover { border-color: var(--border-hover); }
        input:focus {
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px var(--accent-soft);
        }
        input.is-invalid { border-color: var(--danger); }
        input.is-invalid:focus { box-shadow: 0 0 0 3px var(--danger-soft); }

        .field-hint {
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 6px;
        }
        .error-msg {
            font-size: 12px;
            color: var(--danger);
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* ── Divider ── */
        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 24px 0;
        }

        /* ── Actions ── */
        .form-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
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
    </style>
</head>
<body>
<div class="page">

    <a href="{{ route('users.index') }}" class="back-link">
        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M9 11L5 7l4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        Back to Users
    </a>

    <h1 class="page-title">Create User</h1>
    <p class="page-subtitle">Add a new account to the system.</p>

    <div class="card">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="field">
                <label for="name">Full Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Jane Doe"
                    value="{{ old('name') }}"
                    class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    autocomplete="name"
                >
                @error('name')
                    <p class="error-msg">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M6 4v2.5M6 8v.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="field">
                <label for="email">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="jane@example.com"
                    value="{{ old('email') }}"
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    autocomplete="email"
                >
                @error('email')
                    <p class="error-msg">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M6 4v2.5M6 8v.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Min. 8 characters"
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    autocomplete="new-password"
                >
                @error('password')
                    <p class="error-msg">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"><circle cx="6" cy="6" r="5" stroke="currentColor" stroke-width="1.4"/><path d="M6 4v2.5M6 8v.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round"/></svg>
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
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none"><path d="M2 7l3.5 3.5L11 3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    Save User
                </button>
            </div>
        </form>
    </div>

</div>
</body>
</html>