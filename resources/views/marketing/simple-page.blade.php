@extends('layouts.marketing')

@section('content')
    <section class="border-b border-white/10 bg-[radial-gradient(circle_at_top,rgba(20,184,166,0.12),transparent_24%),linear-gradient(180deg,#070b12_0%,#090d14_100%)] py-20 md:py-24">
        <div class="container-wide">
            <div class="max-w-[56rem]">
                <div class="text-[0.9rem] font-semibold uppercase tracking-[0.28em] text-white/58">{{ $content['kicker'] }}</div>
                <h1 class="mt-5 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(3rem,6vw,5rem)] font-semibold leading-[0.98] tracking-tight text-white">
                    {{ $content['title'] }}
                </h1>
                <p class="mt-6 max-w-[44rem] text-[clamp(1rem,1.8vw,1.35rem)] leading-relaxed text-white/70">
                    {{ $content['intro'] }}
                </p>
            </div>
        </div>
    </section>

    <section class="bg-[#f3f5f8] text-[#101827]">
        <div class="container-wide py-14 md:py-16">
            <div class="max-w-[56rem] rounded-[2rem] border border-[#e4e9f0] bg-white p-8 shadow-[0_10px_30px_rgba(15,23,36,0.04)]">
                @foreach ($content['body'] as $paragraph)
                    <p class="@if (! $loop->first) mt-4 @endif text-lg leading-relaxed text-[#475569]">
                        {{ $paragraph }}
                    </p>
                @endforeach
            </div>
        </div>
    </section>
@endsection
