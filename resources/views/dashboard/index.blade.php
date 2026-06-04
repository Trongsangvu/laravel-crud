@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <nav class="topnav">
        <a href="{{ route('dashboard') }}" class="nav-brand">
            <div class="nav-brand-icon">
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <rect x="1" y="1" width="5" height="5" rx="1" fill="white" />
                    <rect x="8" y="1" width="5" height="5" rx="1" fill="white" opacity=".5" />
                    <rect x="1" y="8" width="5" height="5" rx="1" fill="white" opacity=".5" />
                    <rect x="8" y="8" width="5" height="5" rx="1" fill="white" />
                </svg>
            </div>
            <span class="nav-brand-name">AdminPanel</span>
        </a>

        <div class="nav-right">
            <div class="nav-user">
                <div class="nav-avatar">{{ mb_substr(Auth::user()->name, 0, 1) }}</div>
                <span class="nav-user-name">{{ Auth::user()->name }}</span>
            </div>

            <div class="nav-divider"></div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    Sign out
                </button>
            </form>
        </div>
    </nav>

    <div class="dashboard-page">
        <div class="welcome-banner">
            <div>
                <div class="welcome-title">
                    Good to see you, <span>{{ Auth::user()->name }}</span> 👋
                </div>
                <div class="welcome-sub">
                    Here's a summary of what's happening in your account.
                </div>
            </div>

            <div class="welcome-badge">
                User Dashboard
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon stat-icon-blue">
                    ✓
                </div>
                <div>
                    <div class="stat-label">Account</div>
                    <div class="stat-value">Active</div>
                    <div class="stat-hint">
                        Member since {{ Auth::user()->created_at->format('M Y') }}
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-icon-green">
                    ✓
                </div>
                <div>
                    <div class="stat-label">Status</div>
                    <div class="stat-value">Verified</div>
                    <div class="stat-hint stat-hint-up">Email confirmed</div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-icon-warn">
                    !
                </div>
                <div>
                    <div class="stat-label">Role</div>
                    <div class="stat-value">{{ ucfirst(Auth::user()->role->value) }}</div>
                    <div class="stat-hint">Standard access</div>
                </div>
            </div>
        </div>

        <div class="two-col">
            <div class="card" style="padding: 0">
                <div class="section-head">Recent Activity</div>

                <ul class="activity-list">
                    <li class="activity-item">
                        <span class="activity-dot dot-green"></span>
                        <span class="activity-text">
                            <strong>Account created</strong> — registration completed
                        </span>
                        <span class="activity-time">
                            {{ Auth::user()->created_at->diffForHumans() }}
                        </span>
                    </li>

                    <li class="activity-item">
                        <span class="activity-dot dot-blue"></span>
                        <span class="activity-text">
                            <strong>Signed in</strong> — new session started
                        </span>
                        <span class="activity-time">Just now</span>
                    </li>

                    <li class="activity-item">
                        <span class="activity-dot dot-warn"></span>
                        <span class="activity-text">
                            <strong>Profile</strong> — no changes yet
                        </span>
                        <span class="activity-time">—</span>
                    </li>
                </ul>
            </div>

            <div class="card" style="padding: 0">
                <div class="section-head">Quick Actions</div>

                <ul class="quick-actions">
                    <li>
                        <a href="#" class="quick-action">
                            <div class="quick-action-icon">👤</div>
                            Edit profile
                            <span class="quick-action-arrow">›</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="quick-action">
                            <div class="quick-action-icon">🔒</div>
                            Change password
                            <span class="quick-action-arrow">›</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" class="quick-action">
                            <div class="quick-action-icon">⚙</div>
                            Preferences
                            <span class="quick-action-arrow">›</span>
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="quick-action">
                                <div class="quick-action-icon quick-action-danger">↪</div>
                                Sign out
                                <span class="quick-action-arrow">›</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
