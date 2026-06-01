<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $metaTitle ?? 'Ranulph' }}</title>
        <meta name="description" content="{{ $metaDescription ?? 'Ranulph public pages and governed AI operating model content.' }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="ranulph-home-body">
        <div class="min-h-screen bg-[#050505] text-white">
            <header class="marketing-header">
                <div class="container-nav flex items-center justify-between py-5 md:py-7">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 text-white">
                        <img src="https://advancedanalytica.co.uk/images/infrastructure/logo.svg" alt="Advanced Analytica" class="h-7 w-auto md:h-9" decoding="async">
                        <span class="sr-only">Advanced Analytica</span>
                    </a>

                    <div class="hidden md:flex md:flex-1 md:items-center md:justify-end md:gap-6">
                        <div class="relative flex flex-1 items-center justify-end gap-6">
                            <nav class="marketing-nav">
                                <a href="{{ route('home') }}" class="transition-colors hover:text-white">Home</a>
                                <a href="{{ route('use-cases') }}" class="transition-colors hover:text-white">Use Cases</a>
                                <a href="{{ route('opinions') }}" class="transition-colors hover:text-white">Opinions</a>
                                <a href="{{ route('resources') }}" class="transition-colors hover:text-white">Resources</a>
                                <a href="{{ route('about') }}" class="transition-colors hover:text-white">About</a>
                            </nav>

                            <a href="{{ route('search') }}" class="marketing-icon-button" aria-label="Search">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="9" cy="9" r="5"></circle>
                                    <path d="M13 13l4 4"></path>
                                </svg>
                            </a>
                        </div>

                        @auth
                            <a href="{{ route('dashboard') }}" class="marketing-ghost-button px-4 py-2 text-sm">
                                Open portal
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="marketing-ghost-button px-4 py-2 text-sm">
                                Sign in
                            </a>
                        @endauth

                        <a href="{{ route('home') }}#contact" class="marketing-primary-button px-4 py-2 text-sm">
                            Get in touch
                        </a>
                    </div>
                </div>
            </header>

            <main>
                @yield('content')
            </main>

            @include('partials.marketing-footer')
        </div>
    </body>
</html>
