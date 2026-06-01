@extends('layouts.marketing')

@section('content')
    <section class="border-b border-white/10 bg-[radial-gradient(circle_at_top,rgba(20,184,166,0.12),transparent_24%),linear-gradient(180deg,#070b12_0%,#090d14_100%)] py-20 md:py-24">
        <div class="container-wide">
            <div class="max-w-[58rem]">
                <a href="{{ $backUrl }}" class="inline-flex items-center text-sm font-semibold uppercase tracking-[0.2em] text-white/58 transition-colors hover:text-white">
                    {{ $backLabel }}
                </a>
                <div class="mt-6 text-[0.9rem] font-semibold uppercase tracking-[0.28em] text-white/58">{{ $kicker }}</div>
                <h1 class="mt-5 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(3rem,6vw,5rem)] font-semibold leading-[0.98] tracking-tight text-white">
                    {{ $article['title'] }}
                </h1>
                <p class="mt-6 max-w-[44rem] text-[clamp(1rem,1.8vw,1.35rem)] leading-relaxed text-white/70">
                    {{ $article['summary'] }}
                </p>
                <div class="mt-6 flex flex-wrap gap-2">
                    @foreach ($article['tags'] as $tag)
                        <span class="rounded-full border border-white/15 bg-white/6 px-3 py-1 text-xs font-semibold text-white/78">
                            {{ $tag }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#f3f5f8] text-[#101827]">
        <div class="container-wide py-14 md:py-16">
            <article class="max-w-[52rem]">
                <div class="grid gap-6 text-lg leading-relaxed text-[#445166]">
                    @foreach ($article['body'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </article>
        </div>
    </section>
@endsection
