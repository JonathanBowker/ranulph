<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Ranulph Portal')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="portal-body">
        <div class="portal-site-shell">
            <header class="marketing-header portal-header">
                <div class="container-nav flex items-center justify-between py-5 md:py-7">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 text-white">
                        <img src="https://advancedanalytica.co.uk/images/infrastructure/logo.svg" alt="Advanced Analytica" class="h-7 w-auto md:h-9" decoding="async">
                        <span class="sr-only">Ranulph portal</span>
                    </a>

                    <div class="flex items-center gap-2 md:hidden">
                        <a class="marketing-ghost-button px-3 py-2 text-xs" href="{{ route('home') }}">Site</a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="marketing-primary-button px-3 py-2 text-xs">Log out</button>
                        </form>
                    </div>

                    <div class="hidden md:flex md:flex-1 md:items-center md:justify-end md:gap-6">
                        <div class="relative flex flex-1 items-center justify-end gap-6">
                            <nav class="marketing-nav portal-nav" aria-label="Primary">
                                <a href="{{ route('dashboard') }}" @class(['is-active' => request()->routeIs('dashboard')])>Overview</a>
                                <a href="{{ route('portal.workspaces') }}" @class(['is-active' => request()->routeIs('portal.workspaces')])>Workspaces</a>
                                <a href="{{ route('portal.billing') }}" @class(['is-active' => request()->routeIs('portal.billing')])>Billing</a>
                                <a href="{{ route('portal.support') }}" @class(['is-active' => request()->routeIs('portal.support')])>Support</a>
                                @if (auth()->user()->isSuperAdmin())
                                    <a href="{{ route('admin.users.index') }}" @class(['is-active' => request()->routeIs('admin.users.*')])>Users</a>
                                @endif
                                <a href="{{ route('profile.edit') }}" @class(['is-active' => request()->routeIs('profile.*')])>Profile</a>
                            </nav>
                        </div>

                        <div class="portal-account">
                            <span class="portal-account__name">{{ auth()->user()->name }}</span>
                            <a class="marketing-ghost-button px-4 py-2 text-sm" href="{{ route('home') }}">View site</a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="marketing-primary-button px-4 py-2 text-sm">Log out</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="border-t border-white/10 md:hidden">
                    <nav class="marketing-mobile-nav container-nav grid gap-1 py-4 text-base font-medium" aria-label="Mobile portal navigation">
                        <a href="{{ route('dashboard') }}" @class(['rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white', 'bg-white/5 text-white' => request()->routeIs('dashboard')])>Overview</a>
                        <a href="{{ route('portal.workspaces') }}" @class(['rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white', 'bg-white/5 text-white' => request()->routeIs('portal.workspaces')])>Workspaces</a>
                        <a href="{{ route('portal.billing') }}" @class(['rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white', 'bg-white/5 text-white' => request()->routeIs('portal.billing')])>Billing</a>
                        <a href="{{ route('portal.support') }}" @class(['rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white', 'bg-white/5 text-white' => request()->routeIs('portal.support')])>Support</a>
                        @if (auth()->user()->isSuperAdmin())
                            <a href="{{ route('admin.users.index') }}" @class(['rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white', 'bg-white/5 text-white' => request()->routeIs('admin.users.*')])>Users</a>
                        @endif
                        <a href="{{ route('profile.edit') }}" @class(['rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white', 'bg-white/5 text-white' => request()->routeIs('profile.*')])>Profile</a>
                    </nav>
                </div>
            </header>

            <main class="portal-shell">
                @if (session('status'))
                    <div class="container-wide">
                        <div class="status-banner">{{ session('status') }}</div>
                    </div>
                @endif

                @yield('content')
            </main>

            @include('partials.marketing-footer')
        </div>
    </body>
</html>
