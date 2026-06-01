<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Search | Ranulph</title>
        <meta name="description" content="Search across the local Ranulph landing page, portal entry points, and authentication screens.">
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
                        </div>

                        <a href="{{ route('login') }}" class="marketing-ghost-button px-4 py-2 text-sm">
                            Sign in
                        </a>
                        <a href="{{ route('home') }}#contact" class="marketing-primary-button px-4 py-2 text-sm">
                            Get in touch
                        </a>
                    </div>
                </div>
            </header>

            <section class="border-b border-white/10 bg-[radial-gradient(circle_at_top,rgba(20,184,166,0.12),transparent_24%),linear-gradient(180deg,#070b12_0%,#090d14_100%)] py-20 md:py-24">
                <div class="container-wide">
                    <div class="max-w-[60rem]">
                        <div class="text-[0.9rem] font-semibold uppercase tracking-[0.28em] text-white/58">Search</div>
                        <h1 class="mt-5 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(3rem,6vw,5rem)] font-semibold leading-[0.98] tracking-tight text-white">
                            Find what you need
                        </h1>
                        <p class="mt-6 max-w-[44rem] text-[clamp(1rem,1.8vw,1.35rem)] leading-relaxed text-white/70">
                            Search across local Ranulph pages, use cases, forms, and key portal entry points.
                        </p>
                    </div>

                    <form action="{{ route('search') }}" method="get" class="mt-10 max-w-[64rem] rounded-[1.7rem] border border-white/10 bg-white/6 p-4 shadow-[inset_0_1px_0_rgba(255,255,255,0.02)] md:p-5">
                        <div class="flex flex-col gap-4 md:flex-row">
                            <label for="search-query" class="sr-only">Search</label>
                            <input id="search-query" name="q" type="search" value="{{ $query }}" placeholder="Search" class="min-h-[3.8rem] flex-1 rounded-[1.2rem] border border-white/10 bg-[#171c24] px-6 text-lg text-white placeholder:text-white/38 focus:outline-none focus:ring-2 focus:ring-[#14B8A6]/40">
                            <button type="submit" class="inline-flex min-h-[3.8rem] items-center justify-center rounded-[1.2rem] bg-[#21c6bb] px-8 text-sm font-semibold uppercase tracking-[0.24em] text-white transition-colors hover:bg-[#14B8A6]">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <section class="bg-[#f3f5f8] text-[#0f1724]">
                <div class="container-wide py-14 md:py-16">
                    <div class="flex flex-wrap items-center justify-between gap-3 border-b border-[#dfe5ed] pb-6 text-sm text-[#506073]">
                        <div>
                            @if ($query !== '')
                                Results for "{{ $query }}".
                            @else
                                Enter a query to see results.
                            @endif
                        </div>
                        <div>{{ $resultCount }} {{ \Illuminate\Support\Str::plural('result', $resultCount) }}</div>
                    </div>

                    <div class="mt-8 grid gap-8 lg:grid-cols-[15rem_minmax(0,1fr)] lg:items-start">
                        <aside class="rounded-[1.7rem] border border-[#e4e9f0] bg-white p-5 shadow-[0_10px_30px_rgba(15,23,36,0.04)]">
                            <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-[#5b6980]">Filters</div>

                            <div class="mt-6">
                                <div class="text-sm font-semibold text-[#202a39]">Content Type</div>
                                <div class="mt-4 grid gap-3">
                                    @foreach ($typeCounts as $type => $count)
                                        <div class="flex items-center justify-between rounded-full border border-[#e5eaf1] bg-[#f8fafc] px-4 py-3 text-sm text-[#344154]">
                                            <span>{{ $type }}</span>
                                            <span class="rounded-full bg-white px-2 py-0.5 text-xs font-semibold text-[#5b6980]">{{ $count }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-8 border-t border-[#eef2f6] pt-6">
                                <div class="flex items-center justify-between gap-4">
                                    <div class="text-sm font-semibold text-[#202a39]">Tags</div>
                                    <a href="{{ route('search', $query !== '' ? ['q' => $query] : []) }}" class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-[#5b6980]">Clear</a>
                                </div>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach ($tagCounts as $tag => $count)
                                        <span class="inline-flex items-center gap-2 rounded-full border border-[#e5eaf1] bg-[#f8fafc] px-3 py-2 text-[0.72rem] font-semibold uppercase tracking-[0.14em] text-[#516073]">
                                            {{ $tag }}
                                            <span class="text-[#8a96a8]">{{ $count }}</span>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </aside>

                        <div class="grid gap-8">
                            @forelse ($results as $result)
                                @php
                                    $path = parse_url($result['url'], PHP_URL_PATH) ?: '/';
                                    $fragment = parse_url($result['url'], PHP_URL_FRAGMENT);
                                @endphp
                                <article class="border-b border-[#e1e7ef] pb-8 last:border-b-0">
                                    <div class="flex flex-wrap items-center gap-3 text-sm">
                                        <span class="rounded-full bg-[#20c4b9] px-3 py-1 text-[0.72rem] font-semibold uppercase tracking-[0.16em] text-white">
                                            {{ $result['type'] }}
                                        </span>
                                        <span class="font-semibold text-[#7a8798]">
                                            {{ $path }}@if ($fragment)#{{ $fragment }}@endif
                                        </span>
                                    </div>

                                    <h2 class="mt-3 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(1.8rem,3vw,2.5rem)] font-semibold leading-tight tracking-tight text-[#111827]">
                                        <a href="{{ $result['url'] }}" class="transition-colors hover:text-[#0f766e]">{{ $result['title'] }}</a>
                                    </h2>
                                    <p class="mt-3 max-w-[46rem] text-lg leading-relaxed text-[#445166]">
                                        {{ $result['snippet'] }}
                                    </p>

                                    <div class="mt-5 flex flex-wrap gap-2">
                                        @foreach (array_slice($result['tags'] ?? [], 0, 4) as $tag)
                                            <span class="rounded-full border border-[#e5eaf1] bg-white px-3 py-1 text-xs font-semibold text-[#4e5c70]">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                        @if ($result['requires_auth'])
                                            <span class="rounded-full border border-[#ff8c69]/35 bg-[#fff7f4] px-3 py-1 text-xs font-semibold text-[#c15b36]">
                                                Sign in required
                                            </span>
                                        @endif
                                    </div>
                                </article>
                            @empty
                                <article class="rounded-[1.7rem] border border-[#e4e9f0] bg-white p-8 shadow-[0_10px_30px_rgba(15,23,36,0.04)]">
                                    <h2 class="font-['Archivo','Segoe_UI',sans-serif] text-3xl font-semibold tracking-tight text-[#111827]">
                                        No results yet
                                    </h2>
                                    <p class="mt-3 max-w-[42rem] text-lg leading-relaxed text-[#445166]">
                                        Try a more specific query such as "fraud controls", "magic link", or "deal deep-dive".
                                    </p>
                                </article>
                            @endforelse
                        </div>
                    </div>

                </div>
            </section>

            @include('partials.marketing-footer')
        </div>
    </body>
</html>
