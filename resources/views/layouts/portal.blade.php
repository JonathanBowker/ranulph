<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Ranulph Portal')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="portal-body">
        <div class="portal-frame">
            <header class="portal-topbar">
                <a class="portal-brand" href="{{ route('dashboard') }}">
                    <span class="portal-brand__mark">RP</span>
                    <span>
                        <strong>Ranulph</strong>
                        <small>Self-service operations portal</small>
                    </span>
                </a>

                <nav class="portal-nav" aria-label="Primary">
                    <a href="{{ route('dashboard') }}" @class(['is-active' => request()->routeIs('dashboard')])>Overview</a>
                    <a href="{{ route('portal.workspaces') }}" @class(['is-active' => request()->routeIs('portal.workspaces')])>Workspaces</a>
                    <a href="{{ route('portal.billing') }}" @class(['is-active' => request()->routeIs('portal.billing')])>Billing</a>
                    <a href="{{ route('portal.support') }}" @class(['is-active' => request()->routeIs('portal.support')])>Support</a>
                    @if (auth()->user()->isSuperAdmin())
                        <a href="{{ route('admin.users.index') }}" @class(['is-active' => request()->routeIs('admin.users.*')])>Users</a>
                    @endif
                    <a href="{{ route('profile.edit') }}" @class(['is-active' => request()->routeIs('profile.*')])>Profile</a>
                </nav>

                <div class="portal-account">
                    <span>{{ auth()->user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </div>
            </header>

            <main class="portal-shell">
                @if (session('status'))
                    <div class="status-banner">{{ session('status') }}</div>
                @endif
                @yield('content')
            </main>
        </div>
    </body>
</html>
