@extends('layouts.marketing')

@section('content')
    <section class="border-b border-white/10 bg-[radial-gradient(circle_at_top,rgba(20,184,166,0.12),transparent_24%),linear-gradient(180deg,#070b12_0%,#090d14_100%)] py-20 md:py-24">
        <div class="container-wide">
            <div class="max-w-[56rem]">
                <div class="text-[0.9rem] font-semibold uppercase tracking-[0.28em] text-white/58">{{ $kicker }}</div>
                <h1 class="mt-5 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(3rem,6vw,5rem)] font-semibold leading-[0.98] tracking-tight text-white">
                    {{ $pageTitle }}
                </h1>
                <p class="mt-6 max-w-[42rem] text-[clamp(1rem,1.8vw,1.35rem)] leading-relaxed text-white/70">
                    {{ $intro }}
                </p>
            </div>

            @if (!empty($showRss))
                <div class="mt-8">
                    <a href="{{ route('rss-feeds') }}" class="inline-flex items-center rounded-full border border-white/15 px-4 py-2 text-sm font-semibold text-white/78 transition-colors hover:bg-white/6 hover:text-white">
                        {{ $rssLabel }}
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section class="bg-[#f3f5f8] text-[#101827]">
        <div class="container-wide py-14 md:py-16">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($items as $item)
                    <article class="rounded-[2rem] border border-[#e4e9f0] bg-white p-6 shadow-[0_10px_30px_rgba(15,23,36,0.04)]">
                        <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-[#14B8A6]">{{ $item['series'] }}</div>
                        <h2 class="mt-4 font-['Archivo','Segoe_UI',sans-serif] text-3xl font-semibold leading-tight tracking-tight text-[#101827]">
                            @if (!empty($item['url']))
                                <a href="{{ $item['url'] }}" class="transition-colors hover:text-[#0f766e]">{{ $item['title'] }}</a>
                            @else
                                {{ $item['title'] }}
                            @endif
                        </h2>
                        <p class="mt-4 text-base leading-relaxed text-[#475569]">
                            {{ $item['summary'] }}
                        </p>
                        <div class="mt-5 flex flex-wrap gap-2">
                            @foreach ($item['tags'] as $tag)
                                <span class="rounded-full border border-[#e5eaf1] bg-[#f8fafc] px-3 py-1 text-xs font-semibold text-[#4e5c70]">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                        @if (!empty($item['url']))
                            <div class="mt-6">
                                <a href="{{ $item['url'] }}" class="inline-flex items-center text-sm font-semibold text-[#0f766e] transition-colors hover:text-[#0b5f59]">
                                    Read more
                                </a>
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endsection
