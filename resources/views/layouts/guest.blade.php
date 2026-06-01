@props([
    'panelTitle' => 'Connect to our suite of intelligent services',
    'panelAccent' => '#withRANULPH',
    'panelCopy' => 'Use Ranulph to turn risk insights into controlled AI communications, governed workflows, and machine-operable controls.',
    'panelFooter' => "Trusted by some of the world's largest brands",
    'pageTitle' => 'Sign in',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="portal-body auth-screen-body">
        <div class="signin-shell">
            <section class="signin-form-panel">
                <div class="signin-form-panel__inner">
                    <header class="signin-header">
                        <a href="/" class="signin-back" aria-label="Back to home">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M15.25 4.75L8 12l7.25 7.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2"/>
                            </svg>
                        </a>
                        <h1>{{ $pageTitle }}</h1>
                    </header>

                    {{ $slot }}
                </div>
            </section>

            <aside class="signin-brand-panel">
                <div class="signin-brand-panel__copy">
                    <h2>
                        {{ $panelTitle }}
                        <span>{{ $panelAccent }}</span>
                    </h2>
                    <p>{{ $panelCopy }}</p>
                    <small>{{ $panelFooter }}</small>
                </div>
            </aside>
        </div>
    </body>
</html>
